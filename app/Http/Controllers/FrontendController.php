<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class FrontendController extends Controller
{
   public function index(){
      $categories =category::get();
        $activeImage = Banner::where('status', '1')->first();
         $product = ProductsModel::with(['category'])->latest()->get();
        return view('welcome',compact('activeImage','categories','product'));
   }
   public function shop(){
      $products = ProductsModel::with(['category'])->latest()->get();
      return view('front-end.Shop',compact('products'));
   }
   public function shopByCategory(){
      
   }

}
