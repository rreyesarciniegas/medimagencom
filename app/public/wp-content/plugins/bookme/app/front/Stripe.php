<?php
namespace Bookme\App\Front;

use Bookme\Inc;

/**
 * Class Stripe for Payment Gateway
 */
class Stripe extends Inc\Core\App
{
    /** @var array Zero-decimal currencies */
    private $zero_decimal = array( 'BIF', 'CLP', 'DJF', 'GNF', 'JPY', 'KMF', 'KRW', 'MGA', 'PYG', 'RWF', 'VND', 'VUV', 'XAF', 'XOF', 'XPF', );


    public function perform_stripe()
    {
        $response = null;
        $userData = new Inc\Mains\Booking\UserData( Inc\Mains\Functions\Request::get_parameter( 'form_id' ) );

        if ( $userData->load() ) {
            $failed_cart_key = $userData->cart->get_failed_cart_key();
            if ( $failed_cart_key === null ) {
                include_once Inc\Mains\Plugin::get_directory() . '/inc/payment/Stripe/init.php';
                \Stripe\Stripe::setApiKey( get_option( 'bookme_stripe_secret_key' ) );
                \Stripe\Stripe::setApiVersion( '2015-08-19' );

                list( $total, $deposit ) = $userData->cart->get_info();
                try {
                    if ( in_array( get_option( 'bookme_currency' ), $this->zero_decimal ) ) {
                        // Zero-decimal currency
                        $stripe_amount = $deposit;
                    } else {
                        $stripe_amount = $deposit * 100; // amount in cents
                    }
                    $charge = \Stripe\Charge::create( array(
                        'amount'      => (int) $stripe_amount,
                        'currency'    => get_option( 'bookme_currency' ),
                        'source'      => Inc\Mains\Functions\Request::get_parameter( 'card' ), // contain token or card data
                        'description' => 'Charge for '.$userData->get( 'email' )
                    ) );

                    if ( $charge->paid ) {
                        $coupon = $userData->get_coupon();
                        if ( $coupon ) {
                            $coupon->claim();
                            $coupon->save();
                        }
                        $payment = new Inc\Mains\Tables\Payment();
                        $payment
                            ->set_type( Inc\Mains\Tables\Payment::TYPE_STRIPE )
                            ->set_status( Inc\Mains\Tables\Payment::STATUS_COMPLETED )
                            ->set_total( $total )
                            ->set_paid( $deposit )
                            ->set_paid_type( $total == $deposit ? Inc\Mains\Tables\Payment::PAY_IN_FULL : Inc\Mains\Tables\Payment::PAY_DEPOSIT )
                            ->set_created( current_time( 'mysql' ) )
                            ->save();
                        $order = $userData->save( $payment );
                        Inc\Mains\Notification\Sender::send_from_cart( $order );
                        $payment->set_details( $order, $coupon )->save();

                        $response = array( 'success' => true );
                    } else {
                        $response = array( 'success' => false, 'error' => __( 'Unexpected Error, try again.', 'bookme' ) );
                    }
                } catch ( \Exception $e ) {
                    $response = array( 'success' => false, 'error' => $e->getMessage() );
                }
            } else {
                $response = array(
                    'success'         => false,
                    'failed_cart_key' => $failed_cart_key,
                    'error' => esc_html__('Selected time slot is not available anymore. Please, choose another time slot.', 'bookme'),
                );
            }
        } else {
            $response = array('success' => false, 'error' => esc_html__('Invalid session data.', 'bookme'));
        }

        wp_send_json( $response );
    }

    /**
     * Register ajax for a class
     */
    protected function register_ajax()
    {
        Inc\Core\Ajax::register_ajax_actions($this, array('app' => 'everyone'), array(), true);
    }
}