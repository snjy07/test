@extends('admin.layouts.app')

@section('page-part')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order Details</h1>
        <p class="mb-4"> A list of all orders where you can manage your orders. </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                      
            <div class="card-body">
                <div class="row">
                    <ul>
                        <li>
                            Order ID : {{ $order->order_id }}
                        </li>
                        <li>
                            Customer Name : {{ $order->customer->name }}
                        </li>
                        <li>
                            Phone Number : {{ $order->customer->Phone }}
                        </li>
                        <li>
                            Address : {{ $order->customer->address }}
                        </li>
                       
                    </ul>
                </div>
                <div class="row">
                    <h6 class="mb-2">Ordered Items</h6>
                    <div class="table-responsive">
                        <table class="table table-stripped" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Stock Number</th>
                                    <th>Price (INR)</th>
                                    <th>Quantity</th>
                                    <th>Product Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->order_items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->product->stock }}</td>
                                        <td>{{ $item->product->price }}</td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>{{ $item->product->price*$item->product_qty }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                   
                                    @php
                                        $sum = 0;
                                        foreach ($order->order_items as $item){
                                            $sum+= $item->product->price;
                                        }
                                    @endphp
                                    <td colspan="4" class="text-right">Bag Total :</td>
                                    <td colspan="">₹{{ $sum }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection