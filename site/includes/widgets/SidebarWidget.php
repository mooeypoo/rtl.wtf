<?php

namespace RTLWTF;

class SidebarWidget extends \OOUI\Widget {
	/**
	 * @param array $config Configuration options
	 */
	public function __construct( array $config = array() ) {
		// Parent constructor
		parent::__construct( $config );

		// Menu
		$menu = new \OOUI\ButtonGroupWidget();
		$menu->addClasses( array( 'wtf-ui-sidebarWidget-menu' ) );
		if ( isset( $config['menu'] ) ) {
			// Add 'top' link
			$items = array( new \OOUI\ButtonWidget( array(
				'framed' => false,
				'label' => 'Back to Top',
				'href' => '#pagetop',
			) ) );

			foreach ( $config['menu'] as $item ) {
				$button = new \OOUI\ButtonWidget( array(
					'framed' => false,
					'label' => $item['label'],
					'href' => $item['href'],
				) );

				$items[] = $button;
			}

			$menu->addItems( $items );
		}

		$this->addClasses( array( 'wtf-ui-sidebarWidget' ) );
		$this->appendContent( $menu );
	}
}
