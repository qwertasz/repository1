<?php




abstract class FileData {

	private $filePath = null;

	protected $data = [];

	protected $fillable = false; //deklaracja wlasnej tablicy z dozwolonymi elementami

	public function __construct( $filePath ) {
		if ( ! file_exists( $filePath ) ) {
			$dir = dirname( $filePath );
			if ( ! file_exists( $dir ) ) {
				mkdir( $dir, 0755, true ); // 0755 -> prawa dostepu unix
			}
			touch( $filePath );
		}
		$this->filePath = $filePath;

		$this->data = @unserialize( file_get_contents( $this->filePath ) )
			?: []; // short if - jesli wynik funkcji !== false to przypisze wynik lub pusta tablice

	}

	public static function fileExists( $filePath ) {
		return file_exists( $filePath );
	}

	public function __set( $varname, $value ) {
		if ( $this->fillable === false || ( is_array( $this->fillable ) && in_array( $varname, $this->fillable ) ) ) {
			$this->data[ $varname ] = $value;
		} else {
			throw new Exception( "Pole {$varname} niedozwolone!!" );
		}
	}

	public function __get( $varname ) {
		return isset( $this->data[ $varname ] ) ? $this->data[ $varname ] : null;
	}

	public function save() {
		return file_put_contents( $this->filePath, serialize( $this->data ) );
	}
}