<?php
require_once "includes/autoload.php";

// Top
require_once "includes/pieces/page_head.php";

// Main
$display = $page;
if ( strlen( $display) === 0 ) {
	$display = 'rtl.wtf';
} ?>
	<?php require_once "includes/pages/" . $display . ".php"; ?>
<?php
// Bottom
require_once "includes/pieces/page_toolbars.php";
require_once "includes/pieces/page_tail.php";
