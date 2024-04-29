<?php
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
define( 'DB_NAME', 'scroll' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'T6zMbFRbwh6}@HcReUh-e_Zp9|~c%!+<~Un~h)ul_2n%1%sY[}l]%ej; (`3y2|_' );
define( 'SECURE_AUTH_KEY',  '5)wT]; w^u$2+>e?4Z#c5u$[5mCem41|)J{!leL/sW9%:~c+g{-Q?7~Yr__,yZI|' );
define( 'LOGGED_IN_KEY',    '-7A:/WHJV{(RRH|!:q-VH}wjY?h&,OBA_kpgyMYAnXWKDgXy[ (r>p(d<{mv)v!g' );
define( 'NONCE_KEY',        'pYz] ;GkWt1=@q1]a6Y*@15A<jxdA)W$t2^hz5O <[<Lr-ow486#Xd)9)b+y81cf' );
define( 'AUTH_SALT',        '#<A1S-M/6lHw9Y(~{q9I?>AfPBv`dARn_1k}/` i^/v|!U:}!>n5!z#hkuwA3c5h' );
define( 'SECURE_AUTH_SALT', '4<&90[5R-Jxz<gMD`7DArcLv9Z(%s|@Z54^bNx@@ U*<+qxYG5<0jFj^(KJOa(,t' );
define( 'LOGGED_IN_SALT',   '!IY1&Api=C%N3-l>8=9/bPEO +<l>]YDT%I=sSHe5gquP!9UA_d=OjE6[ @K1W:,' );
define( 'NONCE_SALT',       'c VL.,S><WlOBa|sRJlkXis(e~SUX/rhc1]1HD5oJtder~+(D YKkO(h.?>&25),' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
