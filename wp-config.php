<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings

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
define( 'DB_NAME', 'awsstart_esafeco' );

/** Database username */
define( 'DB_USER', 'awsstart_esafeco' );

/** Database password */
define( 'DB_PASSWORD', 'b76eYzgN9XjZZ65TVpDC' );

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
define( 'AUTH_KEY',         'z7oTZfzc$lvW@]]W&:aYh`{]A~FiNf-Y^C5i~>}jJ9yI4UA,u!@)W:*fneo@=Ml}' );
define( 'SECURE_AUTH_KEY',  'mXXQ/q{g+a]*,Y>vwrbOZ_8:b73ml$xx<WWx`|Id<hqJFW?oJtQH[&Aj@[CW,.eX' );
define( 'LOGGED_IN_KEY',    'K*B]:WC3NB[bjG@Uy}m#IEH=>QES-eO;c<[?u5,m7>cfGDwYUfVr!O6I>JBhmevQ' );
define( 'NONCE_KEY',        '3VC+x(P!]|/,&;80vi{:|wm7lqv*y qiX%~ieh#wKAe+aD;oT3[R5Z.0|y~Sg&(D' );
define( 'AUTH_SALT',        '53<-w@-Z^oOh[/%b:GAPsj^;9xd|JRrkHnv> N,c<obN2pL,/_Tm^BS?>4Q4SO1C' );
define( 'SECURE_AUTH_SALT', 'Bhe{=FUxh7cJW,PJ^6 zPdZu]/~kzVrF)S8k&yjWWh}:_2/K)hTd5?0@Gcv%X9au' );
define( 'LOGGED_IN_SALT',   'skA,Fm;P7bf/XrvH~bojBW:uC4;*f?!#e@{VQ,3`bM. %o@^i~LaO}W2thS?I~$U' );
define( 'NONCE_SALT',       '>9yBD+xF(D{T]_&9_z%`A=kbs1c/r`(wG~}W*wldvM,=~|%$Nd<R75<EgR(Z(~n.' );

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
