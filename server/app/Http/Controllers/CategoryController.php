<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $data = [
            'message' => 'list categories',
            'data' => $categories
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>['required']
        ]);

        if ($validator->fails()) {
            $data = [
                'message'=>'validation fail',
                'errors'=> $validator->errors()
            ];

            return response()->json($data);
        }

        $category = Category::create([
            'name'=> $request->name
        ]);

        $data = [
            'message' => 'category created success',
            'category' => $category
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required']
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'validation fails',
                'errors' => $validator->errors()
            ];
            return response()->json($data);
        }

        $category->update([
            'name' => $request->name
        ]);

        $data = [
            'message' => 'category updated success',
            'category' => $category
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $data = [
            'message' => 'category deleted success'
        ];

        return response()->json($data);
    }
}
