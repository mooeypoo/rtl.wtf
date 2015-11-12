<?php

namespace RTLWTF;

class PageSectionWidget extends TextWidget {
	protected $dir;
	protected $html;

	/**
	 * @param array $config Configuration options
	 * @param boolean $config['disabled'] Disable (default: false)
	 */
	public function __construct( array $config = array() ) {
		// Parent constructor
		parent::__construct( $config );

		$wrapper = new \OOUI\Tag( 'div' );
		$wrapper->addClasses( array( 'wtf-ui-pageSectionWidget-wrapper' ) );

		// Content
		$this->html = '';
		if ( isset( $config["html"] ) ) {
			$this->html = $config["html"];
			for ( $i = 0; $i < count( $this->html ); $i++ ) {
				$wrapper->appendContent( new \OOUI\HtmlSnippet( $this->html[$i] ) );
			}
		}

		$badge = new \OOUI\Tag( 'div' );
		$badge->addClasses( array( 'wtf-ui-pageSectionWidget-badge' ) );
		$badge->appendContent(
			new \OOUI\LabelWidget( array(
				"label" => strtoupper( $this->dir )
			) )
		);

		$this->addClasses( array(
			'wtf-ui-pageSectionWidget',
		) );
		$this->appendContent( $badge, $wrapper );
	}
}
