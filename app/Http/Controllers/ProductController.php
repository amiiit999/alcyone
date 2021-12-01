<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $productQuery = Product::where('id','>', 0);
        $products = $productQuery->paginate(5);
        $category = Category::all();
        return view('products.index',compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        
        return view('products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|max:190',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required',

            
        ]);
        $input = $request->all();
        
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
       
        $product = new Product();
       
        $product->user_id = $request->user()->id;
        $product->category_id = $request->input('category');
        $product->fill($input);
        $product->image = $imageName;
        $product->save();
        
        return redirect(route('product.index'))->with('flash_success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        
        return view('products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'      => 'required|max:190',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required',

            
        ]);
        $input = $request->all();
        
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
       
      
        $product->user_id = $request->user()->id;
        $product->category_id = $request->input('category');
        $product->fill($input);
        $product->image = $imageName;
        $product->save();
        return redirect(route('product.index'))->with('flash_success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        
        return redirect(route('product.index'))->with('flash_success', 'Product deleted successfully.');
    }
}
