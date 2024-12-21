<?php

namespace App\Http\Controllers\RouteParams;

class LoginPageParams
{
    public string $email = '';
    public string $password = '';
    public bool $userExists = false;
    public bool $firstLogin = false;


    public function __construct() {}
}

?>
