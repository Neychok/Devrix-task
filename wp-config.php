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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'devrix@df$' );

/** MySQL database username */
define( 'DB_USER', 'Potrebitel' );

/** MySQL database password */
define( 'DB_PASSWORD', 'v3Ry57ronKKpAsssW0Rd1337!@#' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']h{#WZ~oJkAp:gC^{e#|{1y-p98m}AQ56OwzL:2BXQjA^}wyI-Af$hPJV6F,!8KI');
define('SECURE_AUTH_KEY',  '?eG9e~6FZ~<`$54F+-V{Mh+r=rnBh@;ELV7P9tJ~2G8>5~Ma:%G0{XZ)>k|e3KL#');
define('LOGGED_IN_KEY',    '8:G@/+m=Pu`}#eYZbt*ch-Xi*_tw_015+Roi,TjjHMD-sVK$~hxus+J_1nkte8E.');
define('NONCE_KEY',        '`E?|I@zux|/~QcOiIapg6M8KZJ-haayos-Dt~pwy[wGhPWaoDdUx/uZ]4]GCnG(]');
define('AUTH_SALT',        'A8:{w/,5!||ES]$>p-cR[o!:N#+aq?MIWy%Em+HPdvfUi s-wvLUs^*,#.h]j$m0');
define('SECURE_AUTH_SALT', '+?]k<G-B7)+=TXNVC.&4Y=q~qT<ro3IJ9/{VUP/0WL.9ibHqx0wJs8;t jNZus@0');
define('LOGGED_IN_SALT',   'KVBTK:@5pBI:hQ||Jjz9*a%B}j3!~^vt-m?-bS!x^K>AJ|_G8no+o,Ctd;`*)uqX');
define('NONCE_SALT',       'O+4N]J=<$2J|#w=#!em,wTk1TF30i<:VPVgn|]XJgL}LJ!T0R+;MAo2N1IR(Yy+t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'f_N402_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
