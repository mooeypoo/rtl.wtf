<?php

namespace RTLWTF;

class TitleWidget extends TextWidget {
	protected $dir;
	protected $size;
	protected $anchor;

	/**
	 * @param array $config Configuration options
	 * @param boolean $config['disabled'] Disable (default: false)
	 */
	public function __construct( array $config = array() ) {
		// Anchor
		if ( isset( $config['anchor'] ) ) {
			$config = array_merge(
				array( "anchor" => $config['anchor'] ),
				$config
			);
		}

		// Parent constructor
		parent::__construct( $config );

		$this->dir = 'rtl';
		if ( isset( $config["dir"] ) ) {
			$this->dir = $config["dir"];
		}

		$this->size = 'normal';
		if ( isset( $config["size"] ) ) {
			$this->size = $config["size"];
		}

		$this->titleType = 'section';
		if ( isset( $config["titleType"] ) ) {
			$this->titleType = $config["titleType"];
		}

		$this->addClasses( array(
			'wtf-ui-titleWidget',
			'wtf-ui-titleWidget-size-' . $this->size,
			'wtf-ui-titleWidget-type-' . $this->titleType,
		) );
	}
}
