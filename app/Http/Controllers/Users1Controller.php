<?php

namespace App\Http\Controllers;

use App\Models\Users1;
use Illuminate\Http\Request;

class Users1Controller extends Controller
{
    public function create(){
            $user=new  Users1();
            $user->name='yawar';
            $user->email='yawar@gmail.com';
            $user->save();
    }
}
