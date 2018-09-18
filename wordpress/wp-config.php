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
define('DB_NAME', 'codelinewp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '(iWVWja8dDN!!DgrC?0X~Z=N#MUOpuZIm,3j-RVs !=15^#z`hb3Ti s1>FMfjrp');
define('SECURE_AUTH_KEY',  'Bdfl!J?/Wv+sd5lAx~+ME$HI=rC{(Sm=2G{{1FLQ2qtNm?b0B k{P~?Sp icv&W2');
define('LOGGED_IN_KEY',    '[>rzLB*bkp&|9neeUTmM##i u}&I:+hJeHtwkneP2umml%nKZy6i0h?S3n3@lN;|');
define('NONCE_KEY',        'ww<E02-NOfBOpM^rKbHwqw$]WbgE6$W$/P;O}#@B(fQn%92! tVY`yY#]xwk4$8-');
define('AUTH_SALT',        'M$R]UJ]#_facY{lHF#m{5=8!jmG6v^x<6FqJ-IW91%ox175~2S:sYs6nZLjdI!Q#');
define('SECURE_AUTH_SALT', '9#C[M2p4/(njF-1t`so|GW)4Ug5,EMI4Mv`b e|TeFgQY.<AGqd~-z8j9is<~5i[');
define('LOGGED_IN_SALT',   'v9Sd[RG+5.|a#Ev/;jwUuj(L}cq-4$cNX_+P1 7j??4XTlRCH76PlEsE|MO=IGcS');
define('NONCE_SALT',       'iv|vR=~zK^+|l?kPDg(M2UM 5cT?)&G[(xi&ew!emsDL[&WUuR~Oq~nn%1Je59_x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cd_';

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
