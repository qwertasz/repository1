<?php

class Common {
	protected function getFromPost( $varname ) {
		return isset( $_POST[ $varname ] ) ? $_POST[ $varname ] : null;//test warunku jeśli prawda, jeśli fałsz
	}
}