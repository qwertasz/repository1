<?php

class UserProfile extends FileData {
	protected $fillable = [ "gender", "phone" ];

	public function __construct( $userName ) {
		parent::__construct( "data/users/{$userName}_profile.dat" );
	}
}
