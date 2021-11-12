<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'WP-BASE' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'eJahIJJkaNMlou:OfT50!$?3AIM]<tg5g*e5sthOA`a3]qWrIADbOT{v66za@tfd' );
define( 'SECURE_AUTH_KEY',  '2/Lw2S)P)q]fp]iN:*1$KM<m,E[N;K9|7H/;WGA<_V4^^ra|QtU@Ult7Snw9L_/?' );
define( 'LOGGED_IN_KEY',    '#M[d_fF(]GPR;)$?pS)GqY4iOVB45A Je2,B&x.NUQpI=d&|BU<(=4bxivop7p^O' );
define( 'NONCE_KEY',        '@Id*UC :%s_BksJQ.l3adO@_<]TlLc!cPKP9PQoLBM$.G=,~(C/*aN&Bku2JH/7c' );
define( 'AUTH_SALT',        'hstaT+ m|0=k~0iJJYX,qw8q_TQ/!lbvA|k4FGud;lifQrWeh>by/ZS|w^hldQv?' );
define( 'SECURE_AUTH_SALT', '*J-qlzL4Dw}Cmm7ojS3vvXIYXGVSKP&vj4CZ68WE%)WrB5X+x3URR8:ZWunJZA%S' );
define( 'LOGGED_IN_SALT',   '-|-4@cA@#p#4O!.24Css#GBk#O8_[Z9/:Rv^_QWDmJ}v0l%wb+|8WkLMsR^/R9M[' );
define( 'NONCE_SALT',       ']x#7Q>9/=A3h|&mF04h}~-^Fz|I]Zr.c5OwWBvu,{Rnae]*EWBu]T6]C?Zk{Cxo|' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
