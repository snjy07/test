@extends('admin.layouts.app')

@section('page-part')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Customer</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add following customer info</h6>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <!--begin::Form-->
                        <form action="{{ route('admin.customers.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('name') == true ? 'is-invalid' : ''; @endphp
                                            <label for="name">Full Name</label>
                                            <input type="text" name="name" class="form-control {{ $errCls }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('phone') == true ? 'is-invalid' : ''; @endphp
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control {{ $errCls }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('address') == true ? 'is-invalid' : ''; @endphp
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control {{ $errCls }}"></textarea>
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                  
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Add Product</span>
                                </button>
                                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection