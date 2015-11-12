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
define('DB_NAME', 'ijoon');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'qnffid53%#');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'U>o5Hq}w=fqi|)z|!2+0bU;:cCB91;X->.it)TUp+0 =Jg*|Z=0;[sc93()7Y!y2');
define('SECURE_AUTH_KEY',  '}T,<,isdwaE!J:9.=AdN(cimZb+~}9w+nTh*|jg%|O%59r+<]/&d*E]mO:S8sBOf');
define('LOGGED_IN_KEY',    'DX6Y>YKkt[*q`;iJA2a[^Hzw=#Tv=O}7.EdY&p7.+3jzgNyp&#)F=I$<Ml=Q-Q|N');
define('NONCE_KEY',        'cD]H`f^L(j*]ZhO$_,C7gy^9K;0R#K:!T?-6]w0hG]7-SoGB@;,Ky6Y~W<g@;,;Z');
define('AUTH_SALT',        'Fuzb{w7^eLqV2nl^zDc4.5W&ZrYn-}hB<_&Isq-f$*O,pMK{aZL@2I*Wn9bmGcF$');
define('SECURE_AUTH_SALT', '?@K2M C3vA~LETB+&c]b6RR$^H|iveijNwE}Hf0sVv&eV5V=@qU$T2eS!;_UUScs');
define('LOGGED_IN_SALT',   'AyjKH+JCP@-RIU$dQ[=|jgy:2H?VzDku->h;ll{L|Yi07|vHb1!mbt#(YF6;`bG^');
define('NONCE_SALT',       'Oj|hu$ AZ?^()06KiiV3oRUUt.S:|+:yFFmwd.*B>qbtOD{>#2Ae~:?aovBn++eB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
