<?php

namespace App\Http\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class UserService {
    static function GetUsers() {
        $allUsers = User::with([
            'address'
        ])->get();

        return view('viewUsers', [
            'users' => $allUsers,
            'editedUser' => null
        ]);
    }
    static function deleteUser(int $id) {
        $user = User::findOrFail($id);
        $user->delete();

        return self::GetUsers();
    }
    static function getUpdateUserContainer(int $id){
        $user = User::findOrFail($id);
        $companies = Company::all();
        return view('viewUsers', [
            'users' => User::with([
                'address'
            ])->get(),
            'editedUser' => $user,
            'companies' => $companies
        ]);
    }
    static function updateUser(int $id, Request $req) {
        $user = User::findOrFail($id);
        $user->name = $req->input('username');
        $user->email = $req->input('email');
        $user->id_company = $req->input('company');
        $user->phone = $req->input('phone');
        $user->timestamps = false;
        $user->save();
        return self::GetUsers();
    }

    static function getUserDetails(){

        $usersByCity = User::join('address', 'user.id_address', '=', 'address.id')
        ->select('address.city', DB::raw('COUNT(*) as user_count'))
        ->groupBy('address.city')
        ->get();

        $cities = $usersByCity->pluck('city')->toArray(); // Nomes das cidades
        $userCounts = $usersByCity->pluck('user_count')->toArray(); // Quantidade de usuários

        return view('userDetails', [
            'cities' => $cities,
            'userCounts' => $userCounts,
        ]);
    }
}

?>
