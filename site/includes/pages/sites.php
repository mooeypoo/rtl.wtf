<?php
$struct = array(
	array(
		"title" => null,
		"sections" => array(
			"<p>Coming soon...</p>",
		)
	),
);

echo new RTLWTF\PageOutputWidget( $struct, array(
	'pageTitle' => "(tsk tsk) Sites"
) );
