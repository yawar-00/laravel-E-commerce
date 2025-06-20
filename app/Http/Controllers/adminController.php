<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class adminController extends Controller
{
    public function index(){
        $productscount=ProductsModel::latest()->get()->count();
        $userscount=User::latest()->get()->count();
        $categoriescount=category::get()->count();
        return view('adminDashboard',compact('productscount','userscount','categoriescount'));
    } 
    
}
