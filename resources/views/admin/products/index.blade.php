@extends('admin.layouts.app')

@section('page-part')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Products Inventory</h1>
        <p class="mb-4"> A list of all products where you can manage your products. </p>

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
                                <th>Name</th>
                                <th>Price (INR)</th>
                                <th>Quantity</th>
                                <th>Stock Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Price (INR)</th>
                                <th>Quantity</th>
                                <th>Stock Number</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td> 
                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-primary btn-circle">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.products.confirmDelete', $item->id) }}" class="btn btn-danger btn-circle">
                                            <i class="fas fa-trash"></i>
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