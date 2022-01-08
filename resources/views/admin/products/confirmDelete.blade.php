@extends('admin.layouts.app')

@section('page-part')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Product</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-danger">Are you sure you want to delete this item ?</h6>
                    </div>
            
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price (INR)</th>
                                        <th>Quantity</th>
                                        <th>Stock Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $model->name }}</td>
                                        <td>{{ $model->price }}</td>
                                        <td>{{ $model->quantity }}</td>
                                        <td>{{ $model->stock }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="{{ route('admin.products.destroy', $model->id) }}" method="POST">
                            @csrf
                            {{ method_field('delete') }}
                           
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Yes</span>
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">No</a>
                        </form>
                        
                    </div>
                    <!--end::Form-->
                
                </div>

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection