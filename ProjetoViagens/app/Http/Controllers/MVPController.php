<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Start; 

class MVPController extends Controller {

    public static function login() {
        return view('insta.login');
    }

    public static function register() {
        return view('insta.register');
    }

    public static function account($tipo) {
        switch ($tipo) {
            case 'iniciar' :
                return self::login();
                break;
            case 'register':
                return self::register();
                break; 
                default:
                    header("Location:/");
        }
    }
    

}
