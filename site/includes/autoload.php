<?php
require_once "vendor/autoload.php";

// Figure out the site directionality
$allowed_domains = array( 'rtl.wtf', 'ltr.wtf' );
$allowed_directions = array( 'rtl', 'ltr' );
$sitedir = 'rtl'; // Default to RTL
if (
	( $_SERVER['HTTP_HOST'] && in_array( $_SERVER['HTTP_HOST'], $allowed_domains ) ) ||
	( $_SERVER['SERVER_NAME'] && in_array( $_SERVER['SERVER_NAME'], $allowed_domains ) )
) {
	$parts = explode( '.', $_SERVER['HTTP_HOST'] );
	$sitedir = $parts[ 0 ];
}
// If there is a get variable, override the direction with it
if ( isset( $_GET['dir'] ) && $_GET['dir'] !== $sitedir && in_array( $_GET['dir'], $allowed_directions ) ) {
	$sitedir = $_GET['dir'];
}
define( "SITE_DIR", $sitedir );

// Load OOUI system
OOUI\Theme::setSingleton( new OOUI\MediaWikiTheme() );
OOUI\Element::setDefaultDir( $sitedir );
