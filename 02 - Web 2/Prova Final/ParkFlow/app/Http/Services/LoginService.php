<?php

namespace App\Http\Services;

use App\Http\Controllers\RouteParams\Login\LoginParams;
use App\Models\User;

final class LoginService
{
    static function Login(LoginParams $data){
        $userIfExists = User::where('email', $data->identification)->first();

        if(!$userIfExists)
            $userIfExists = User::where('document', $data->identification)->first();

        if(!$userIfExists)
            return view('login', [
                'data' => $data,
                'error' => 'Usuário ou senha incorretos'
            ]);

        // dd($userIfExists);

        if($userIfExists->hash != $data->password)
            return view('login', [
                'data' => $data,
                'error' => 'Usuário ou senha incorretos (senha)'
            ]);



        session_start();
        $_SESSION['token'] = $userIfExists->name;
        return redirect('/');
    }

    static function Logout(){
        session_start();
        session_destroy();
        return view('login', [
            'data' => new LoginParams()
        ]);
    }
}
