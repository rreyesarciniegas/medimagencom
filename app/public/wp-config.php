<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bO5V+SAW8CkvqKnx0X7jjFCDzDCioAClhmRk1eOkbixMIgHRGH8hxSEzuE++oqIQN7IJXjDhSCm6/SAlq/XsEw==');
define('SECURE_AUTH_KEY',  'mC3A+uwsorA2uf6eLNjPa29dVhGQiWSsrhD4Ud6/RKxRS6sxcgCxZ+NoQF8TdV1n8taaUWesotef3647XbVlAg==');
define('LOGGED_IN_KEY',    'Br5LjHfNl5uiX2uz9K4kBZi7BftPe7ERW1Pd9bW8lZ09VQc6zCrKGEAyaQqKUjMGV+0Imu/0kBHa8SzmuvQU9A==');
define('NONCE_KEY',        '4/JIBDVaCkJPDzRUW2sUJWcgHVQhPFUiVloHodEefoaZ8ukT64Vi6JvRJPavSOLB2z3Cxcd2z82DnDk9pKZjLQ==');
define('AUTH_SALT',        'vS6yTxImsCb4jBQUJEtYflyP3S4rBAvHXVRTfgBBjQSRMF7FFu06EemEKcf179/7iThVOaxBcAIZDox/eyX8EQ==');
define('SECURE_AUTH_SALT', 'im9Nf7oMsl+wVrJXu0oX21vszQylO1gCSQLqm5rCi1NO5yns312DhkBwItvDbh/ys0vGgCnFHl92YHIBWXRCPw==');
define('LOGGED_IN_SALT',   '7HBIn/3i0J2fE1C2FIvOGYJCii4+AnTr1L69Tcd2Z9OoeQyLGbxfm8XdEyWVYUE/pfyqSHPSdEhj/LVhFjboKQ==');
define('NONCE_SALT',       'hYvTBBm4DP1A5iH44NRPiiYNWvHStbww3n+oaUbgn7xxnzSdfG/x2tuvrPKbxtBEproxN38QyvHiGExyZ+ESrw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
