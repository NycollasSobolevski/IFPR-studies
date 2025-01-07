<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UserService;

class UserController extends Controller
{
    public function GetUsersPage() {
        return UserService::GetUsers();
    }
    public function getUpdateUserContainer($id) {
        return UserService::getUpdateUserContainer($id);
    }
    public function deleteUser($id) {
        return UserService::deleteUser($id);
    }
    public function updateUser(Request $req, int $id) {
        return UserService::updateUser($id, $req);
    }
    public function getUserDetails() {
        return UserService::getUserDetails();
    }
    public function getCreateUserContainer() {
        return UserService::getCreateUserContainer();
    }
    public function createUser(Request $req) {
        return UserService::create($req);
    }
}

?>
