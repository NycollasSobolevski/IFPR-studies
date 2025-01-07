<?php

namespace App\Http\Controllers\RouteParams\Login;

class LoginParams
{
    public string $identification = '';
    public string $password = '';

    public function __construct() {}

    public function getData(string $identification, string $password): LoginParams {
        $this->identification = $identification;
        $this->password = $password;
        return $this;
    }

    public function getIdentification(): string {
        return $this->identification;
    }
    public function setIdentification(string $identification): void {
        $this->identification = $identification;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): void {
        $this->password = $password;
    }
}

?>
