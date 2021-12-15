<?php
define("WP_CACHE", true);

/** 

 * The base configurations of the WordPress.

 *

 * This file has the following configurations: MySQL settings, Table Prefix,

 * Secret Keys, and ABSPATH. You can find more information by visiting

 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}

 * Codex page. You can get the MySQL settings from your web host.

 *

 * This file is used by the wp-config.php creation script during the

 * installation. You don't have to use the web site, you can just copy this file

 * to "wp-config.php" and fill in the values.

 *

 * @package WordPress

 */

// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

/* slots.my-slotik.com */

define('DB_NAME', 'msn2');

/** MySQL database username */

define('DB_USER', 'msn2');

/** MySQL database password */

define('DB_PASSWORD', 'Y5g8Z1p9');

/** MySQL hostname */

define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */

define('DB_CHARSET', 'utf8');

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

define('AUTH_KEY',         '1CG59ar36LQWq#Nbyfg5RmlrPFi9ExZyIA1v(@JikAG)E0lhN(Ftfv%9KsYXJsA)');

define('SECURE_AUTH_KEY',  'gK6m^BHI4RFP2@wfycGGBkxh63&LC*oqmM(JrXEbZCaXVYXaeSpc5#YgvsyPr4yF');

define('LOGGED_IN_KEY',    'b7tzGvyfPxU2aSNy9IAAoFlM@kmxkl(%5vCF47C4uotpJsoX14MOe5HAw%5r&rV*');

define('NONCE_KEY',        'BgKgKmBzI^OUWt#I@mF(Z8cpvyn@1enjNOHLlk&*&BHVfk6rdE21f4YkCnzvy#zo');

define('AUTH_SALT',        '9e!GsGANWq1Af)NTt9P6RhihXrt&VsvblGhXWI3X6cmgEAjhhvCQ9aNy^DTxK3dP');

define('SECURE_AUTH_SALT', '#^G@lg(vB9Y6UQRld*V9leU^6fOGLoidr4#jSZVf^McxoDOE@JOm3QQlOI6p3E0E');

define('LOGGED_IN_SALT',   'GZtWKx#OOYYU7Mp4eoyeNXr%Ayp#HL#iF7R0)4l#a8Nf!rB1YkozZy@9(NCq9ZbF');

define('NONCE_SALT',       '@2ZMeJHXRv^n*Xj^MJh)zaehuV9tw3Ep%QWfd6Gd@F2qEbo7ijf(e9mkn1nMEaOJ');

/**#@-*/

/**

 * WordPress Database Table prefix.

 *

 * You can have multiple installations in one database if you give each a unique

 * prefix. Only numbers, letters, and underscores please!

 */

$table_prefix  = 'wp_';

/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 */

define('WP_DEBUG', false);
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

define( 'AUTOMATIC_UPDATER_DISABLED', true );
define( 'WP_AUTO_UPDATE_CORE', false );

/* включение логов в wp-content 
define( 'WP_DEBUG', true ); // Or false
if ( WP_DEBUG ) {
}
*/

/**

 * WordPress Localized Language, defaults to English.

 *

 * Change this to localize WordPress.  A corresponding MO file for the chosen

 * language must be installed to wp-content/languages. For example, install

 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German

 * language support.

 */

define ('WPLANG', '@@LOCALE@@');

//define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');

//--- disable auto upgrade

define( 'AUTOMATIC_UPDATER_DISABLED', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');

?>