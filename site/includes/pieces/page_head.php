<?php
	$page = '';
	if ( isset( $_GET['p'] ) ) {
		$page = $_GET['p'];
	}

	// Javascript files
	$scripts = array(
		// "assets/lib/jquery.js",
		// // OOJS
		// "assets/lib/oojs.jquery.js",
		// // OOUI
		// "assets/lib/oojs-ui/oojs-ui.js",
		// "assets/lib/oojs-ui/oojs-ui-mediawiki.js",
		// // RTL.WTF scripts
		// "assets/lib/rtl.wtf/rtl.wtf.js",
		// // Site initialization
		// "assets/initialization.js",
	);

	// Stylesheet
	$stylesheet = array(
		// OOUI
		'ooui' => 'assets/lib/oojs-ui/oojs-ui-mediawiki.css',
		// RTL.WTF utilities
		// 'wtf-util' => 'lib/rtl.wtf/' . $sitedir . '.wtf.css',
		// Site styles
		'wtf-site' => 'assets/' . $sitedir . '.wtf.site.css',
	);
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo strtoupper( $sitedir ) ?>.WTF : Right-to-Left Your Brain</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<?php
	foreach ( $scripts as $script ) {
		echo "<script src='" . $script . "'></script>\n";
	}
	foreach ( $stylesheet as $id => $style ) {
		echo "<link id='" . $id . "' rel=\"stylesheet\" href='" . $style . "'>\n";
	}
?>
	</head>
	<body>
