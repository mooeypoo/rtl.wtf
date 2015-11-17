<?php

namespace RTLWTF;

class PageOutputWidget extends \OOUI\Widget {
	protected $pageTitle = '';
	protected $structure = array();
	protected $sections = array();
	/**
	 * @param array $config Configuration options
	 */
	public function __construct( array $structure = array(), array $config = array() ) {
		// Parent constructor
		parent::__construct( $config );

		$this->structure = $structure;

		// Sidebar
		$menuItems = array();
		for ( $i = 0; $i < count( $structure); $i++ ) {
			if ( $this->structure[ $i ]['title'] ) {
				$menuItems[] = array(
					"label" => $structure[ $i ]['title'],
					"href" => "#" . $this->anchorify( $this->structure[ $i ]['title'] ),
				);
			}
		}
		$this->appendContent( new SidebarWidget( array(
			"menu" => $menuItems,
			"classes" => array( 'wtf-ui-pageOutputWidget-sidebar' ),
		) ) );

		$page = new \OOUI\Tag( 'div' );
		$page->addClasses( array( 'wtf-ui-pageOutputWidget-page' ) );

		// Page title
		if ( isset( $config['pageTitle'] ) ) {
			$page->appendContent( new TitleWidget( array(
				"label" => $config['pageTitle'],
				"anchor" => "pagetop",
				"size" => "large",
				"titleType" => "page",
			) ) );
		}

		// Sections
		for ( $i = 0; $i < count( $this->structure ); $i++ ) {
			// Title
			if ( $this->structure[ $i ]['title'] !== null ) {
				$page->appendContent( new TitleWidget( array(
					"anchor" => $this->anchorify( $this->structure[ $i ]['title'] ),
					"label" => $this->structure[ $i ]['title'],
					"size" => "normal",
				) ) );
			}

			if ( isset( $this->structure[ $i ]['sections'] ) ) {
				$page->appendContent( new PageSectionWidget( array(
					"html" => $this->structure[ $i ]['sections']
				) ) );
			}
		}

		// Page
		$this->appendContent( $page );

		$this->addClasses( array( 'wtf-ui-pageOutputWidget' ) );
	}

	function anchorify( $str ) {
		return urlencode(
			strtolower(
				str_replace( " ", "_", $str )
			)
		);
	}
}
