<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\RouteParams\LoginPageParams;

class LoginController extends Controller
{
    public function index(Request $request) {
        $params = new LoginPageParams();

        $params->email = $request->input('email') ?? '';
        $params->password = $request->input('password') ?? '';
        $params->userExists = $request->input('userExists') ?? false;
        $params->firstLogin = $request->input('firstLogin') ?? false;

        return view('login', [
            'data' => $params
        ]);
    }
}
