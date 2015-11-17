<?php

/* Structure */
$struct = array(
	array(
		"title" => null,
		"sections" => array(
			"<p>Welcome to rtl.wtf, where you can play around and break your brain on Right-to-Left and Bidirectional issues online.</p>",
		)
	),
	array(
		"title" => "Inspiration",
		"sections" => array(
			"<p>The inspiration for this site came from a Tech Talk presentation given in the Wikimedia Foundation in October 2015, and on a blog post on the same subject.</p>" .
			"<p>" .
				"If you want and need background into right-to-left languages and the Unicode Bidirectional Algorithm you should check these out:" .
				"<ul>" .
				"<li>\"<a href=\"https://commons.wikimedia.org/wiki/File:Nothing_Left_but_Always_Right_-_The_Twisted_Road_to_RTL_Support.pdf\">Nothing Left but Always Right - The Twisted Road to RTL Support</a>\" (Presentation slides)</li>" .
				"<li>\"<a href=\"http://moriel.smarterthanthat.com/tips/the-language-double-take-dealing-with-bidirectional-text-or-wait-tahw/\">The Language Double-Take: Dealing with Bidirectional Text (or: Wait, ?tahW)</a>\"</li>" .
				"<li>A <a href=\"https://www.youtube.com/watch?v=qmLdHuFRGgM\">recording of the 2015 Tech Talk</a> is also available<br />" .
					// Youtube video
					"<iframe class=\"youtube-embed\" width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qmLdHuFRGgM\" frameborder=\"0\" allowfullscreen></iframe>" .
				"</li>" .
				"</ul>" .
			"</p>",
		)
	),
	array(
		"title" => "How to use this site",
		"sections" => array(
			"<p>This site is meant to demonstrate some Right-to-Left and mixed-directionalities issues online. You can switch the direction of the site at any time through the directionality buttons at the top.</p>",
		)
	),
	array(
		"title" => "Credits and license",
		"sections" => array(
			"<p>Created and maintained by <a href=\"http://moriel.smarterthanthat.com\">Moriel Schottlender</a></p>",
			"<p>This site and the rtl.wtf demo system is completely Open Source under <a href=\"https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html\">GPLv2 license</a>. Please feel free to discuss issues, contribute and send pull requests at the project's <a href=\"http://github.com/mooeypoo/rtl.wtf\">GitHub repository</a>.</p>",
		)
	),
);

echo new RTLWTF\PageOutputWidget( $struct, array( 'pageTitle' => "Welcome to " . $sitedir . ".wtf!" ) );
