@extends('admin.layouts.app')

@section('page-part')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Order List</h1>
        <p class="mb-4"> A list of all orders where you can manage your orders. </p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (Session::has('success'))
                <div class="alert alert-success m-4">
                    {{ Session::get('success') }}
                </div>
            @endif
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Order Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>S No</th>
                                <th>Order ID</th>
                                <th>Customer ID</th>
                                <th>Order Total</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>
                                        @php
                                            $sum = 0;
                                            foreach ($order->order_items as $item){
                                                $sum+= $item->product->price;
                                            }
                                        @endphp
                                        ₹{{ $sum }}
                                    </td>
                                    <td> 
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection