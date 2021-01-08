<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Product;

use App\Http\Responses;

use App\Http\Responses\Apiforproject;

class Productcontroller extends Controller
{
    public function viewproduct(){
        return view('Product.product');
    }

    public function addproduct(Request $req){
        if($req->wantsJson()){
            $product=new Product();
            $product->name=$req->name;
            
            $product->save(); 
            if($product->save()){
                return response()->json($product);
            }
            else{
                return ['result'=>"not saved"];
            }
            
        }
        else{
            $this->validate($req,[
                'name'=>'required',
                
            ]);
    
            $product=new Product();
            $product->name=$req->name;
            
            $product->save();
            session()->put('success' ,'Successfully added');
            return view('Product.product');
        }
        
    }

    public function listproduct(Request $request){
        if($request->wantsJson()){
            $products=Product::all();
            // return new Apiforproject($products);
            // return $products;
            // $data= new Apiforproject($product);
            return response()->json($products);

        }else{
            $products=Product::all();
            return view('Product.listproduct',['products'=>$products]);
        }
        
    }

    public function editproduct($id,Request $request){
        if($request->wantsJson()){
            $product=Product::find($id);
            return response()->json($product);
        }
        else{
            $product=Product::find($id);
            return view('Product.editproduct',['product'=>$product]);
        }
       
    }

    public function updateproduct($id,Request $request){

        if($request->wantsJson()){ //yo sakeko xaina
            
            $product=Product::find($id);
            $product->name=$request->name;
            $product->save();
            return response()->json($product);
        }
        else{
            $product=Product::find($id);
            $product->name=$req->name;
            $product->save();
            session()->put('editproduct','Successfully Edited');
            return redirect('productlist');
        }
       

    }

    public function deleteproduct($id){
        $product=Product::find($id);
        $product->delete();
        session()->put('deleteproduct','Successfully deleted');
        return redirect('productlist');
    }

   
}
