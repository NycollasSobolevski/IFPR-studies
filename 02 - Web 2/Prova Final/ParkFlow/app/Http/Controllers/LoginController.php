<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\RouteParams\Login\LoginParams;
use App\Http\Services\LoginService;

class LoginController extends Controller
{
    public function	index() {

        $params = new LoginParams();
        return view('login', [
            'data' => $params,
            'error' => ''
        ]);
    }

    public function firstLogin(Request $request) {
        $params = new LoginParams();
        $params->identification = $request->input('identification');

        return view('login', [
            'data' => $params,
            'error' => ''
        ]);
    }

    public function login(Request $request) {
        $params = new LoginParams();
        $params->identification = $request->input('identification');
        $params->password = $request->input('password');

        return LoginService::Login($params);
    }
}
