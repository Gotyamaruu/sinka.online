<?php
define('WP_CACHE', true); // WP-Optimize Cache
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'sinkanori_online' );
/** Database username */
define( 'DB_USER', 'sinkanori_online' );
/** Database password */
define( 'DB_PASSWORD', 'Ntmnhk2122' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '#z`Qp6V(0cA},H#M6:y^52&yN%uiAl28f&$5.Ew}1vrXb0tAL/,B@@tG7|(ikF65' );
define( 'SECURE_AUTH_KEY',  '(*hRg! wBQz`@5(:|*`3snUTW1=8Rn#-$uE>Fn9`A?MI.5%$d{FTu5z;K@wS;oHD' );
define( 'LOGGED_IN_KEY',    '?nop=7R&nOy.7~oDBZ:M=*QH[6Tqb|be4y&Ww$&bJz7oGi`ycJdaxYio<VuSp^.5' );
define( 'NONCE_KEY',        '[Go]}pnBXbwc:cjo+qFuX+zqO5|w.}1EfSPg:$a:{!ByMg,Z:% =vi3Dgw[Zap93' );
define( 'AUTH_SALT',        '$.3(R0)o?mCiD|aicgN1Ungx~U-fWGBvu$gV9GZTY  ;)Ez8,w3KQQpy>P(#``],' );
define( 'SECURE_AUTH_SALT', 'R[!eY0&wuXe3)^~5U_!OeMs!%_<YX_}>a~]fBs|49?gt.zVKBj>L;jL@,6dS9g^#' );
define( 'LOGGED_IN_SALT',   'D-j%}He3Fcr0SCp@HYh$#7#TR_r:HD2@7+43~g*6:=7sG-a{M>j!2FN__&X${wN~' );
define( 'NONCE_SALT',       'zr03F,yljAg/4a2n_j#bgNUMI03$t6;9#4qL_7py>Mhi0!IN-YWJlY+1DI%,Yg~0' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sinkanori';
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';