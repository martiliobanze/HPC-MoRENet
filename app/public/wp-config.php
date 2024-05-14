<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Te%%T6pm|@?sa-0gqQ$`eUS?%.}dX?n7]M^T3i4)43r/VS,kbfr_j!G_~D8$I^G6' );
define( 'SECURE_AUTH_KEY',   '9&;);KPrhFot@`=yv=@{2+GX!IsA9V{u([s?.Tf~]9rYK%sVUZSBp 7i(z,5,uj)' );
define( 'LOGGED_IN_KEY',     'mZCZp43SERMX#[wVfAq$U76~$9kn^R?e5e^QuRZ]XtqCEFZ}k7w!e9,~,V%]YN`l' );
define( 'NONCE_KEY',         'ub*[o))Z!-MTZ5YPKSK,DUP:R7@Xa VM6c^PV(Jf-/{}xzDV15UZm0>F3FpAEzK,' );
define( 'AUTH_SALT',         'wte.E+b*^DFW|Z+2|.=`Oc]j9mQ84yh-g4Z4tzB^EOx1|6`h#xA4r3f% RX:4#Mr' );
define( 'SECURE_AUTH_SALT',  'kkq9}rK!8=nE,c/wbo=OPSI&%,k5~vZ$?TO9ZoX))jW+cgrX06t#HTgO4?K3C/E^' );
define( 'LOGGED_IN_SALT',    'V5wA!1A29fa&NHoeI%:?]+iCBW|(dQSq9]3fh,m-A75ye^M4egb=oOW]2/K)r~WR' );
define( 'NONCE_SALT',        'U=m+43TFjL}lmGud-30j>fQ9n(Ew652k5{0p; Zl; g8)Z- }x^p6s[veLs9vol6' );
define( 'WP_CACHE_KEY_SALT', 'n<h(%#+4FCz[}zELvxr?]ROJu-uizc Wdvo-xnv48F/*25FPP!w}&]YKL3[~f=!$' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
