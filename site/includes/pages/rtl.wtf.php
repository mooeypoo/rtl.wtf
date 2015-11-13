<?php

echo new RTLWTF\TitleWidget( array(
	"label" => "Welcome to " . $sitedir . ".wtf!",
	"size" => "large",
) );

echo new RTLWTF\PageSectionWidget( array(
	// "dir" => "ltr",
	"html" => array(
		"<p>Welcome to rtl.wtf, where you can play around and break your brain on Right-to-Left and Bidirectional issues online.</p>",
	),
) );

echo new RTLWTF\TitleWidget( array(
	"label" => "Inspiration",
	"size" => "normal",
) );

echo new RTLWTF\PageSectionWidget( array(
	// "dir" => "ltr",
	"html" => array(
		"<p>The inspiration for this site came from a Tech Talk presentation given in the Wikimedia Foundation in October 2015, and on a blog post on the same subject.</p>" .
		"<p>" .
			"If you want and need background into right-to-left languages and the Unicode Bidirectional Algorithm you should check these out:" .
			"<ul>" .
			"<li>\"<a href=\"https://commons.wikimedia.org/wiki/File:Nothing_Left_but_Always_Right_-_The_Twisted_Road_to_RTL_Support.pdf\">Nothing Left but Always Right - The Twisted Road to RTL Support</a>\" (Presentation slides)</li>" .
			"<li>\"<a href=\"http://moriel.smarterthanthat.com/tips/the-language-double-take-dealing-with-bidirectional-text-or-wait-tahw/\">The Language Double-Take: Dealing with Bidirectional Text (or: Wait, ?tahW)</a>\"</li>" .
			"<li>The recording of the talk is available here:<br />" .
				// Youtube video
				"<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qmLdHuFRGgM\" frameborder=\"0\" allowfullscreen></iframe>" .
			"</li>" .
			"</ul>" .
		"</p>",
	)
) );

echo new RTLWTF\TitleWidget( array(
	"label" => "How to use this site",
	"size" => "normal",
) );

echo new RTLWTF\PageSectionWidget( array(
	// "dir" => "ltr",
	"html" => array(
		"<p>This site is meant to demonstrate some Right-to-Left and mixed-directionalities issues online. You can switch the direction of the site at any time through the directionality buttons at the top.</p>",
		// "<p><strong>NOTE:</strong> Some of the text in the site is defined to always be Left-to-Right, for the sake of clarity and readability (and to avoid breaking your brain too much) You can see the directionality of the paragraph you are reading by hovering your mouse over it.</p>",
	),
) );

echo new RTLWTF\TitleWidget( array(
	"label" => "Credits and license",
	"size" => "normal",
) );

echo new RTLWTF\PageSectionWidget( array(
	// "dir" => "ltr",
	"html" => array(
		"<p>Created and maintained by <a href=\"http://moriel.smarterthanthat.com\">Moriel Schottlender</a></p>",
		"<p>This site and the rtl.wtf demo system is completely Open Source under <a href=\"https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html\">GPLv2 license</a>. Please feel free to discuss issues, contribute and send pull requests at the project's <a href=\"http://github.com/mooeypoo/rtl.wtf\">GitHub repository</a>.</p>",
	),
) );

