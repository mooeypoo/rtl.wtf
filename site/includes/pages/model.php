<?php

/* Structure */
$struct = array(
	array(
		"title" => null,
		"sections" => array(
			"<p>When you read, when you write, when you look at some website online -- you have a mental model that tells your brain where to look for things in front of you. </p>",
		)
	),
	array(
		"title" => "Page point of origin",
		"sections" => array(
			"<p>When you think Left-to-Right, like in English, the point of \"origin\" of the screen is on the left corner, which is where your eyes are drawn. That is why most English websites display the main pieces of the website on the left: the logo, the menus, etc.</p>",
			"<p>When you think Right-to-Left, however, the point of \"origin\" of the screen is on the right. It is a mirrored mental model, and the Right-to-Left reader's eyes are automatically drawn to the right. The reader expects the important elements to be there.</p>",
		),
	),
	array(
		"title" => "Users' expectations",
		"sections" => array(
			"<p>These expectations are relatively straight forward. When a website is strictly one-language in one-directionality only, the issues of fitting the page to the user's mental model are relatively simple (see 'UI Flipping' for examples.)</p>",
			"<p>But there are still pitfalls that you should beware when designing a right-to-left website, even when that site only deals with one directionality only.</p>",
		),
	),
	array(
		"title" => "Potential pitfalls",
		"sections" => array(
			"<p>Since Right-to-Left sites are mirrored, it's easy to over-compensate when creating a site. For example, a Right-to-Left page usually has its logo and menu on the right, and its content on the left (though right-aligned.) If you use &gt;body dir='rtl'&gt then there is no need to have your logo be written after your content -- the site is already flipped.</p>",
			"<p>Problems arise when websites over-compensate for flipped directalities and miss the mark.</p>",
		),
	),
	array(
		"title" => "Mixed directionalities",
		"sections" => array(
			"<p>You may have cases where you need to display a language in some direction in a page that is in another direction. Examples could be translated names, original text or quotes, or even using terminal commands (in English) in a web page that is Right-to-Left. These cases require using selective flipping of the content, but more importantly, there's a much bigger need in that case to evaluate the pieces of the page and decide which piece is which direction and alignment.</p>",
			"<p>Going even further, websites -- and software in general -- can have a difference between its content and interface, and sometimes those two pieces may exist in different languages, with different directionalities.<p>",
		),
	),
);

echo new RTLWTF\PageOutputWidget( $struct, array( 'pageTitle' => 'The mental model' ) );
