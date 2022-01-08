<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Product::paginate(10);
        return View('admin.products.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.products.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|unique:products',
            'price' => 'integer|required',
            'quantity' => 'required|integer|nullable',
            'stock' => 'required',
        ]);

        $model = new Product;
        $model = $this->productPostModel($model, $request);

        $model->save();
        
        Session::flash('success','Product Added Successfully!');
        return redirect()->route('admin.products.create');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get product details
        $model = Product::find($id);

        return View('admin.products.edit',$model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        //validate request
        $this->validate($request, [
            'name' => 'required|max:255',
            'slug' => 'required|unique:products,slug,'.$id,
            'price' => 'integer|required',
            'quantity' => 'required|integer|nullable',
            'stock' => 'required',
        ]);

        $model = Product::find($id);
        $model = $this->productPostModel($model, $request);
      
        $model->save();
        
        Session::flash('success','Product Updated Successfully!');
        return redirect()->route('admin.products.edit', $model->id);
    
    }

     /**
     * Confirm deletion.
     */
     public function confirmDestroy($id)
     {
        $model = Product::find($id);
       
        return View('admin.products.confirmDelete')->withModel($model);
     }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $model = Product::find($id);

        $model->delete();

        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('admin.products.index');
    }


    private function productPostModel($model, $request) {

        $model->name = $request->name;
        $model->slug = Str::slug($request->slug,'-');
        $model->price = $request->price;
        $model->stock = $request->stock;
        $model->quantity = $request->quantity;
        
        return $model;
    }

}
