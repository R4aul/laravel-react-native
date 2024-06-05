<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'validation fail',
                'errors' => $validator->errors()
            ];

            return response()->json($data);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);
        
        $data =[
            'message'=>'product created success',
            'product' =>$product,
        ];

        return response()->json($data);
    }

    public function show(Product $product){
        return response()->json($product);
    }

    public function update(Request $request, Product $product){

        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stock' =>  ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);     

        if ($validator->fails()) {
            $data = [
                'message' => 'validation fail',
                'errors' => $validator->errors()
                
            ];

            return response()->json($data);
        }
        
        $product->update([
            'name'=> $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' =>$request->stock,
            'category_id' => $request->category_id
        ]);

        $data = [
            'message' => 'product updated success',
            'product' =>$product
        ];

        return response()->json($data);
    }

    public function destroy(Product $product){
        $product->delete();
        $data = [
            'success' => 'product deleted success'
        ];

        return response()->json($data);
    }
}
