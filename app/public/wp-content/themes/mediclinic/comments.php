<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number()) { ?>
	<div class="mkdf-comment-holder clearfix" id="comments">
		<div class="mkdf-comment-holder-inner">
			<div class="mkdf-comments-title">
				<h5><?php comments_number(' ' . esc_html__('No Comments','mediclinic'), '1 '.esc_html__('Comment','mediclinic'), '% '.esc_html__('Comments','mediclinic') ); ?></h5>
			</div>
			<div class="mkdf-comments">
				<?php if ( have_comments() ) { ?>
					<ul class="mkdf-comment-list">
						<?php
						wp_list_comments(
							array_unique(
								array_merge(
									array(
										'callback' => 'mediclinic_mikado_comment'
									),
									apply_filters( 'mediclinic_mikado_comments_callback', array() )
								)
							)
						); ?>
					</ul>
				<?php } ?>
				<?php if( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' )) { ?>
					<p><?php esc_html_e('Sorry, the comment form is closed at this time.', 'mediclinic'); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php
		$mkdf_commenter = wp_get_current_commenter();
		$mkdf_req = get_option( 'require_name_email' );
		$mkdf_aria_req = ( $mkdf_req ? " aria-required='true'" : '' );

		$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

		$mkdf_args = array(
			'id_form' => 'commentform',
			'id_submit' => 'submit_comment',
			'title_reply'=> esc_html__( 'Post a Comment','mediclinic' ),
			'title_reply_before' => '<h5 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h5>',
			'title_reply_to' => esc_html__( 'Post a Reply to %s','mediclinic' ),
			'cancel_reply_link' => esc_html__( 'cancel reply','mediclinic' ),
			'label_submit' => esc_html__( 'Send','mediclinic' ),
            'class_submit'         => 'submit mkdf-btn mkdf-btn-medium mkdf-btn-solid',
			'comment_field' => apply_filters( 'mediclinic_mikado_comment_form_textarea_field', '<textarea id="comment" placeholder="'.esc_attr__( 'Your comment','mediclinic' ).'" name="comment" cols="45" rows="6" aria-required="true"></textarea>'),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'mediclinic_mikado_comment_form_default_fields', array(
				'author' => '<h5 class="mkdf-comment-name">'. esc_html__( 'Name', 'mediclinic' ) .'</h5><input id="author" name="author" type="text" value="' . esc_attr( $mkdf_commenter['comment_author'] ) . '"' . $mkdf_aria_req . ' />',
				'email' => '<h5 class="mkdf-comment-email" >'. esc_html__( 'E-mail', 'mediclinic' ) .'</h5><input id="email" name="email" type="text" value="' . esc_attr(  $mkdf_commenter['comment_author_email'] ) . '"' . $mkdf_aria_req . ' />',
				'url'    => '<h5 class="mkdf-comment-website" >'. esc_html__( 'Website', 'mediclinic' ) .'</h5><input id="url" name="url" type="text" value="' . esc_attr(  $mkdf_commenter['comment_author_url'] ) . '" size="30" maxlength="200" />',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'mediclinic' ) . '</label></p>',
			 ) ) );
	 ?>
	<?php if(get_comment_pages_count() > 1){ ?>
		<div class="mkdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

	<div class="mkdf-comment-form">
		<div class="mkdf-comment-form-inner">
			<?php comment_form($mkdf_args); ?>
		</div>
	</div>
<?php } ?>	