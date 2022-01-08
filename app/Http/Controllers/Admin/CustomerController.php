<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Customer::paginate(10);
        return View('admin.customers.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('admin.customers.add');
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
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $model = new Customer;
        $model = $this->customerPostModel($model, $request);

        $model->save();
        
        Session::flash('success','Customer Added Successfully!');
        return redirect()->route('admin.customers.create');
    
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
       
        //Get customer details
        $model = Customer::find($id);

        return View('admin.customers.edit',$model);
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
            'address' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $model = Customer::find($id);
        $model = $this->customerPostModel($model, $request);
      
        $model->save();
        
        Session::flash('success','Customer Updated Successfully!');
        return redirect()->route('admin.customers.edit', $model->id);
    
    }

        /**
     * Confirm deletion.
     */
    public function confirmDestroy($id)
    {
       $model = Customer::find($id);
      
       return View('admin.customers.confirmDelete')->withModel($model);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $model = Customer::find($id);

        $model->delete();

        Session::flash('success', 'Customer deleted successfully');
        return redirect()->route('admin.customers.index');
    }


    private function customerPostModel($model, $request) {

        $model->name = $request->name;
        $model->address = $request->address;
        $model->phone = $request->phone;
        
        return $model;
    }
}
