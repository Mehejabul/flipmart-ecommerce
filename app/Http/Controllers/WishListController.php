<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\wishlist;

class WishListController extends Controller
{
   public function index(){
    $wishlists = Wishlist::where('wishlist_status',1)->get();
      return view('website.wishlist.wishlist',compact('wishlists'));
   }

   public function store($slug){
      $product = Product::where('product_status',1)->where('product_slug', $slug)->first();
      $wishlist = new wishlist();
      $wishlist ->product_id = $product->product_id;
       $wishlist->save();
       return redirect()->back();

   }

   public function delete($slug){
    $product = Product::where('product_status',1)->where('product_slug',$slug)->firstOrfail();
    Wishlist::where('wishlist_status',1)->where('product_id',$product->product_id)->delete();
    return redirect()->back();
   }
}













