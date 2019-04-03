<?php

class UserRegister extends Common {
	/**
	 * zakladam ze w post mam uzytkownika w postaci tablicy -> name, surname, email, password, passwordRepeat
	 */
	public function register() {
		if ( ! isset( $_POST ) ) {
			throw new Exception( "No data in post" );
		}
		if ( is_null( $this->getFromPost( 'password' ) ) || ( $this->getFromPost( 'password' ) !== $this->getFromPost( 'passwordRepeat' ) ) ) {
			throw new Exception( "Password mismatch" );
		}
		$emailMd5 = md5( $this->getFromPost( 'email' ) );

		$user           = new User( $emailMd5 );
		$user->name     = $this->getFromPost( 'name' );
		$user->surname  = $this->getFromPost( 'surname' );
		$user->email    = $this->getFromPost( 'email' );
		$user->password = sha1( $this->getFromPost( 'password' ) );
		$user->save();
	}

}

