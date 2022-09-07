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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'ziad320763' );

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
define( 'AUTH_KEY',         '4`UcJgI2 VGJX7sG&WjL/ ii*rk%(UHH!lFW^OI$[P^Q+$k}kkSdZ~ 6R+(}riS*' );
define( 'SECURE_AUTH_KEY',  'n0qF>IZV8{[_.%n&^|AyRo6rkFtIt=zh`c7V|HL[g>BJ-,;.%`?2tTS2`d}F@J8+' );
define( 'LOGGED_IN_KEY',    'V4$ZEH;O3p.s}~l+Y0na]chvJ,f_`|yHC/?45_B5j~FE=QDQWE8fGrWe.ZK:k=nE' );
define( 'NONCE_KEY',        'UbJhR8tKp,u^s2AIX,GX%RV;ij?whEuTt!!6f.^]_!fXbEDQ+%f|kty;+s{yJ!dU' );
define( 'AUTH_SALT',        '8FPbk4+^DRxh*B3s1)(DoNkBH!83&ak+EJRvl<dq`Es0>/yG;M.2sjIvzI$U9`Cx' );
define( 'SECURE_AUTH_SALT', 'S&O*)^YaIu^;<#GY9NKSI6/ZKH ]$4h[t}shy>lRz;_m&<:A#ss|zV${^UH:d:gI' );
define( 'LOGGED_IN_SALT',   '3gyffFVo^);KW}}|6XBa7V1p^#B}}-m!>yNZDiVCmw4^1OWD}&Xu,.),]ssof;OJ' );
define( 'NONCE_SALT',       'z)tI<R=zxU }JbEyGR-RQdL8JnP^52}CkDG?=Ip)K{<M9=<Pr/t1D4M:nD*pc}(7' );

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
