<?php

class UserLogin extends Common {
	public function login() {
		$emailMd5 = md5( $this->getFromPost( 'email' ) );
		if ( ! User::userExists( $emailMd5 ) ) {
			throw new Exception( "user do not exists" );
		}
		$emailMd5 = md5( $this->getFromPost( 'email' ) );
		$u        = new User( $emailMd5 );
		if ( $u->password == sha1( $this->getFromPost( 'password' ) ) ) {
			return true;
		} else {
			throw new Exception( "Wrong password" );//wyrzuca błąd, który można zlapać
		}
	}

}
