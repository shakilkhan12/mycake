<?php

namespace App\Controllers;

use App\Models\userModel;
use Core\Libraries\Controller;

class userController extends Controller
{
    public function __construct()
    {
        // echo "user controller";
    }
    public function userProfile($name, $email, $phone)
    {
        echo "Name is: $name <br>";
        echo "Email is: $email <br>";
        echo "Phone is: $phone <br>";
    }

    public function index()
    {
        $userInfo = ["name" => 'Shakil', 'email' => 'asad@gmail.com'];
        $this->render("loginView", ['info' => $userInfo, 'contact' => '345345345']);
    }

    public function loginUser()
    {
        $userModel = new userModel();
        $store = $userModel->fetchData();
        $this->render("loginView", ['users' => $store]);
    }
}
