<?php

namespace RTLWTF;

class TopMenuWidget extends \OOUI\Widget {
	protected $dir;

	/**
	 * @param array $config Configuration options
	 * @param boolean $config['disabled'] Disable (default: false)
	 */
	public function __construct( array $config = array() ) {
		// Parent constructor
		parent::__construct( $config );

		$this->dir = 'rtl';
		if ( isset( $config["dir"] ) ) {
			$this->dir = $config["dir"];
		}

		$menu = new \OOUI\Tag( 'ul' );
		$menu->addClasses( array( 'wtf-ui-topMenuWidget-menu' ) );
		$this->mixin( new \OOUI\GroupElement( $this, array_merge( $config, array( 'group' => $menu ) ) ) );

		// Logo
		$logo = new \OOUI\Tag( 'div' );
		$logo->addClasses( array( 'wtf-ui-topMenuWidget-logo' ) );
		if ( isset( $config['logo'] ) ) {
			$logoButton = new \OOUI\ButtonWidget( array(
				"framed" => false,
				"label" => $config['logo']['label'],
				"href" => $config['logo']['href'],
			) );
			$logo->appendContent( $logoButton );
		}

		// Menu
		if ( isset( $config['menu'] ) ) {
			$items = array();

			foreach ( $config['menu'] as $item ) {
				$li = new \OOUI\Tag( 'li' );
				$li->appendContent( new \OOUI\ButtonWidget( array(
					'framed' => false,
					'label' => $item['label'],
					'href' => $item['link']
				) ) );

				$items[] = $li;
			}
			$this->addItems( $items );
		}

		// Edge
		$edge = new \OOUI\Tag( 'div' );
		$edge->addClasses( array( 'wtf-ui-topMenuWidget-edge' ) );
		if ( isset( $config['edgeButtons'] ) ) {
			// Add selected class
			$selected = $config['edgeButtons']['selected'];
			$config['edgeButtons']['items'][ $selected ]->addClasses( array( 'wtf-ui-topMenuWidget-edge-button-selected' ) );

			// Create button group widget
			$edgeButtons = new \OOUI\ButtonGroupWidget( array(
				"items" => $config['edgeButtons']['items'],
			) );

			// Add clear:both div
			$clearDiv = new \OOUI\Tag( 'div' );
			$clearDiv->addClasses( array( 'wtf-clear' ) );

			$edge->appendContent( $edgeButtons, $clearDiv );
		}

		$this->appendContent( $logo, $menu, $edge );
		$this->addClasses( array( 'wtf-ui-topMenuWidget' ) );
	}
}
