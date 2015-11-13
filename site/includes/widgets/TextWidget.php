<?php

namespace RTLWTF;

class TextWidget extends \OOUI\Widget {
	protected $dir;
	protected $label;

	/**
	 * @param array $config Configuration options
	 * @param boolean $config['dir'] Disable (default: SITE_DIR)
	 */
	public function __construct( array $config = array() ) {
		// Parent constructor
		parent::__construct( $config );

		$this->dir = \SITE_DIR;
		if ( isset( $config["dir"] ) ) {
			$this->dir = $config["dir"];
			$this->addClasses( array( 'wtf-' . $this->dir ) );
		}

		if ( isset( $config["label"] ) ) {
			$this->label = $config["label"];
		}

		$this->appendContent( $this->label );
	}
}
