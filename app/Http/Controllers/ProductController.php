<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\SaveProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        return view('pages.products.index',[
            'products' => Product::latest()->paginate(15),
            'resource' => request()->resource > 0? Product::find(request()->resource) : new Product(),
        ]);
    }

    public function store(SaveProduct $request){
        $data = $request->validated();
        Product::create($data);
        session()->flash('success', 'item stored successfully ');
        return back();
    }


    public function update(SaveProduct $request , Product $product){
        $data = $request->validated();
       $product->update($data);
        session()->flash('success', 'item updated successfully ');
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Product Deleted successfully ');
        return back();
    }
}
