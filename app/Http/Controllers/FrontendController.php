<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;

use App\Models\Banner;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class FrontendController extends Controller
{
   public function index(){
      $categories =category::get();
        $activeImage = Banner::where('status', '1')->first();
         $products = ProductsModel::latest()->get();
        return view('welcome',compact('activeImage','categories','products'));
   }
   public function shop(){
      $products = ProductsModel::with(['category'])->latest()->get();
      return view('front-end.Shop',compact('products'));
   }
   public function shopByCategory($id){
      $products = ProductsModel::where('category_id',$id)->latest()->get();
      return view('front-end.Shop',compact('products'));
      
      
   }
   public function shopProduct($id){
      $product = ProductsModel::findOrFail($id);
      return view('front-end.ShopProduct',compact('product'));
      
      
   }
   public function BuyNow($id)
   {
       $product = ProductsModel::findOrFail($id);
   
       $api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
       
       $razorpayOrder = $api->order->create([
           'receipt' => 'rcptid_' . $product->id,
           'amount' => intval($product->price * 100), // Amount in paise
           'currency' => 'INR'
       ]);
   
       $order_id = $razorpayOrder['id'];
   
       return view('front-end.payment', compact('product', 'order_id'));
   }
   
}
