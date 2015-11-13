<?php
// Top menu
$query = array( "dir" => SITE_DIR );
if ( isset( $page ) && strlen( $page ) > 0 ) {
	$query['p'] = $page;
}

echo new RTLWTF\TopMenuWidget( array(
	"logo" => array(
		"label" => '<' . $sitedir . '.wtf>',
		"href" => 'http://' . $sitedir . '.wtf/' . ( count( $query) > 0 ? '?' . http_build_query( $query ) : '' ),
	),
	"menu" => array(
		array(
			"label" => "Typing",
			"link" => "?" . http_build_query( array_merge( $query, array( 'p' => 'typing' ) ) ),
		),
		array(
			"label" => "UI Flipping",
			"link" => "?" . http_build_query( array_merge( $query, array( 'p' => 'flipping' ) ) ),
		),
		array(
			"label" => "(tsk tsk) Sites",
			"link" => "?" . http_build_query( array_merge( $query, array( 'p' => 'sites' ) ) ),
		),
	),
	"edgeButtons" => array(
		"selected" => $sitedir === 'ltr' ? 0 : 1,
		"items" => array(
			new OOUI\ButtonWidget( array(
				'label' => 'LTR',
				'disabled' => ( $sitedir === 'ltr' ),
				'href' => '?' . http_build_query( array_merge( $query, array( 'dir' => 'ltr' ) ) ),
			) ),
			new OOUI\ButtonWidget( array(
				'label' => 'RTL',
				'disabled' => ( $sitedir === 'rtl' ),
				'href' => '?' . http_build_query( array_merge( $query, array( 'dir' => 'rtl' ) ) ),
			) ),
		)
	),
) );

// Bottom menu
?>
