<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_item;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::paginate(15);
        return View('admin.orders.index')->withOrders($orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get all customer list 
        $customers = Customer::all();

        //Get all customer list 
        $products = Product::all();

        return View('admin.orders.add',compact('customers','products'));
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
            'customer_id' => 'required',
        ]);

        $orderObj = new Order;

        $orderObj->customer_id = $request->customer_id;
        $orderObj->order_id = Str::random(10);

        $isSaved = $orderObj->save();

        if($isSaved) {
            // $orderMapObj = new Order_item;
            $data = [];

            foreach ($request->products as $key => $product) {

                $data[$key]['order_no'] = $orderObj->id;
                $data[$key]['product_id'] = $product['pid'];
                $data[$key]['product_qty'] = $product['qty'];

            }

            Order_item::insert($data);
        }

        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('admin.orders.index');
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
        $order = Order::find($id);
        return View('admin.orders.view')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }

    public function updateBag(Request $request){

        $response = [
            'product_price' =>'',
            'product_qty' =>'',
            'product_total' =>'',
        ];

        //Get product details by ID
        $product = Product::where('id',$request->pid)->first();

        $response['product_price'] =  $product->price;
        $response['product_qty'] =  $request->qty;
        $response['product_total'] =  $product->price*$request->qty;

        echo json_encode($response);
		die;
    }
}
