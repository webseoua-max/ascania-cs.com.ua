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
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "ascania_acs" );

/** Database username */
define( 'DB_USER', "ascania_acs" );

/** Database password */
define( 'DB_PASSWORD', "i%J4U7rk!5" );

/** Database hostname */
define( 'DB_HOST', "ascania.mysql.tools" );

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
define( 'AUTH_KEY',         'zk`,3qHl1Y(/wmYL5czoXIKDFsuobwTR!wa3y#w#(7m,na.dP5c&7UCD;Pk{%*cy' );
define( 'SECURE_AUTH_KEY',  'D7(I6bZ<rcj2;&OFZ3c<7[uQ;}`0d_|N=>y[pcYmS]a}&WiiubcyrI*9KVG%z$]p' );
define( 'LOGGED_IN_KEY',    'l8Y:_RtRLetq4:T:]1c/)V7P;F[5[6HU]ZjS97PL1P.lU[8.T:E+r&#Ik_+uA!~7' );
define( 'NONCE_KEY',        'HP7MGfC~dqXe|~:^9D|0O!Uh7O>,_N/64gIj8oLuEBDEi 7)g6pGJD-X2|$B?4>P' );
define( 'AUTH_SALT',        'EATYKWx5:}OjG[AX!(5n&[PlK;u7e_`jB^mbv}=}]2 Nj>OCkB KjVywu)w&jA<c' );
define( 'SECURE_AUTH_SALT', 'i,1Jb_N<olq|1G<bZ>G`x.GWYW<B^AJxi@d[)Vb/z~/9LFMR.m/7<x275RWs*>u>' );
define( 'LOGGED_IN_SALT',   '6D%92w!{rPA87^z?+,||z7D ~T4%{5B-EHSVDC]0`AVVM_Yw P(o)OZg$8tBo`Lz' );
define( 'NONCE_SALT',       'GS%Ym2D=227q,8NPiE)9G0{/4u:5$7&~dX|X;%c+v>t` P6im7v1P. fRvm6j$&q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
