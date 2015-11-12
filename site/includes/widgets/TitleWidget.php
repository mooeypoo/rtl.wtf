<?php

namespace RTLWTF;

class TitleWidget extends TextWidget {
	protected $dir;
	protected $size;

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

		$this->size = 'normal';
		if ( isset( $config["size"] ) ) {
			$this->size = $config["size"];
		}

		$this->addClasses( array(
			'wtf-ui-titleWidget',
			'wtf-ui-titleWidget-size-' . $this->size,
		) );
	}
}
