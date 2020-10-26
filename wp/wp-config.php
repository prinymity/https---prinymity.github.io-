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
define( 'DB_NAME', 'cnccdmos_wp308' );

/** MySQL database username */
define( 'DB_USER', 'cnccdmos_wp308' );

/** MySQL database password */
define( 'DB_PASSWORD', 'QSO769p8-[' );

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
define( 'AUTH_KEY',         'umocb67nz0x2k4qqfyxfsc6s2ogai6b5j1ykjzpv02li1ij8pelkivoe0avypeje' );
define( 'SECURE_AUTH_KEY',  'uokwn0zpirnlcucodmqfsoslfvaitaojvf75axkybp5htbpbtohuj0hulfqgir3g' );
define( 'LOGGED_IN_KEY',    'pc8mth44dvzxcfapv3unhiua4cshmmctlhf6aahk87qegceap304dcuzkfrj2ean' );
define( 'NONCE_KEY',        'chqu088dwihqakuvtqdsyeyxbopgzkikk7ym5x6d5m4leb25ysi3wx0fpohobzmc' );
define( 'AUTH_SALT',        '50i4fytvklevnbw0vpdwd7ennqn0t5zdmheipzyuh8zkopopecm0csg8um6h3uo5' );
define( 'SECURE_AUTH_SALT', 'tptgb1mhpuwdngweez7dxdb9zbjy0ei45sxsnaplwytiztxmomc9pfky8wscluuv' );
define( 'LOGGED_IN_SALT',   'iwv1hdahoq1lx238yejecwhxpndxwdkivebxikyrwafemceitg81fsmlwbu5cvrp' );
define( 'NONCE_SALT',       'epxpe3gfgvmi0zjnnluah066loiecs5z42mzx5optmyjtfizqqkfl21of5iuhdri' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpwt_';

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
