<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Product::query();

        return view('products.index', ['data' => $data->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if($request->hasFile('images')){

            $img = time() . '.' . request()->images->getClientOriginalExtension();
            request()->images->move(storage_path('app/public/images'), $img);
            $request->merge(['image' => $img]);
        }

        // $product = new Product;

        // $product->name = $request->name;
        // $product->category = $request->category;
        // $product->description = $request->description;


        unset($request['_token']);
        

        // $product->save();
        Product::create($request->all());

        return redirect()->route('product.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.create', ['product' => $product]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        // $product = Product::findOrFail($id);
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->category = $request->category;
        
        // $product->save();
        unset($request['_token']);
        unset($request['_method']);
        // dd($request);
        if($request->hasFile('images')){

            $img = time() . '.' . request()->images->getClientOriginalExtension();
            request()->images->move(storage_path('app/public/images'), $img);
            $request->merge(['image' => $img]);
        }
        Product::whereId($id)->update($request->except('images'));
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::whereId($id)->delete();
        return redirect()->route('product.index');
    }
}
