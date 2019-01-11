<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class engine extends Controller
{
    public function regster(Request $request){
        // header("Access-Control-Allow-Origin:*");
            $firstname = $request -> firstname;
            $middlename = $request -> middlename;
            $lastname = $request -> lastname;
            $email = $reauest -> email;
            $username = $request -> username;
            $password = $request -> password;

           $push = DB::table("users") -> insert(
["firstname" => $firstname, "middlename" => $middlename, "lastname" => $lastname, "email" => $email, "username" => $username, "password" => $password]
            );

if(!$push){
    echo "There was an error";
}else{
    echo "Sucess, logging in........";
}

    }

    public function login(Request $reauest){
        $email = $request -> email;
        $password = $request -> password;
$user = DB::select("SELECT email,password FROM users");


    }
}
