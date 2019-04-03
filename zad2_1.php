<?php
    require_once 'FileData.php';//klasa abstrakcyjna, deklaracja tablicy
    require_once 'User.php';//klasa dziedzicząca po FileData, setter magiczny, walidacja pól
    require_once 'Common.php';//test warunku varname
    require_once 'UserProfile.php';//extends FileData
    require_once 'UserRegister.php';//dane użytkownika pobrane postem
    require_once 'UserLogin.php';
    
//-------------------
$userInstance = new User( 'acichowicz' ); // inicjalizacja obiektu user i ustawienie nazwy uzytkownika ktora bedzie nazwa pliku

$userInstance->name    = "Aleksander"; // ustawienie atrybutu, ktory nie istnieje powoduje wywolanie funkcji __set()
$userInstance->surname = "Cichowicz";
$userInstance->email   = 'olek@cichowicz.eu';
$userInstance->save(); // wywolanie funkcji zapisujacej, ktora zapisze do pliku
var_dump( $userInstance );

$userProfile         = new UserProfile( 'acichowicz' );
$userProfile->gender = 'm';
$userProfile->save();

$_POST = [
	"email"          => "olek@cichowicz.eu",
	"name"           => 'Aleksander',
	"surname"        => "Cichowicz",
	"password"       => "test",
	"passwordRepeat" => "test",
];

$ur = new UserRegister();
$ur->register();

$_POST = [
	"email"    => "olek@cichowicz.eu",
	"password" => "test1",
];

try {
	$ul = new UserLogin();
	$ul->login();
} catch ( Exception $e ) {
	echo "Nie mozna sie zalogowac: {$e->getMessage()}";
}



