<?php
$root_dir = dirname( __DIR__ );
$webroot_dir = $root_dir . '/web';

/**
 * Load environment variables with Dotenv
 */
$dotenv = new Dotenv\Dotenv($root_dir);

if (file_exists( $root_dir . '/.env' )) {
	$dotenv->load( $root_dir );
	$dotenv->required( array( 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME' ) );
}

/**
 * Environment settings
 */
define( 'WP_ENV', getenv( 'WP_ENV' ) ? getenv( 'WP_ENV' ) : 'development' );
define( 'WP_HOME', getenv( 'WP_HOME' ) );
define( 'WP_SITEURL', getenv( 'WP_SITEURL' ) ? getenv( 'WP_SITEURL' ) : WP_HOME . '/wp' );

$environment = __DIR__ . '/env/' . WP_ENV . '.php';

if( file_exists( $environment ) )
	require_once( $environment );

/**
 * Database settings
 */
define( 'DB_NAME', getenv( 'DB_NAME' ) );
define( 'DB_USER', getenv( 'DB_USER' ) );
define( 'DB_PASSWORD', getenv( 'DB_PASSWORD' ) );
define( 'DB_HOST', getenv( 'DB_HOST' ) ? getenv( 'DB_HOST' ) : 'localhost' );

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

$table_prefix = 'wp_';

/**
 * Content directory
 */
define( 'CONTENT_DIR', '/app' );
define( 'WP_CONTENT_DIR', $webroot_dir . CONTENT_DIR );
define( 'WP_CONTENT_URL', WP_HOME . CONTENT_DIR );

/**
 * Keys and salts
 */
define( 'AUTH_KEY', getenv('AUTH_KEY') );
define( 'SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY') );
define( 'LOGGED_IN_KEY', getenv('LOGGED_IN_KEY') );
define( 'NONCE_KEY', getenv('NONCE_KEY') );
define( 'AUTH_SALT', getenv('AUTH_SALT') );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') );
define( 'LOGGED_IN_SALT', getenv('LOGGED_IN_SALT') );
define( 'NONCE_SALT', getenv('NONCE_SALT') );

/**
 * Other WordPress settings
 */
define( 'DISALLOW_FILE_MODS', true );

/**
 * Load WordPress
 */
if( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', $webroot_dir . '/wp/' );
