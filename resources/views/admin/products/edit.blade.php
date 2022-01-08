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
                        <h6 class="m-0 font-weight-bold text-primary">Update following product info</h6>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        
                        <!--begin::Form-->
                        <form action="{{ route('admin.products.update',$id) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('name') == true ? 'is-invalid' : ''; @endphp
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" value="{{ $name }}" class="form-control {{ $errCls }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('slug') == true ? 'is-invalid' : ''; @endphp
                                            <label for="slug">Product Slug</label>
                                            <input type="text" name="slug" value="{{ $slug }}" class="form-control {{ $errCls }}">
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('price') == true ? 'is-invalid' : ''; @endphp
                                            <label for="price">Price</label>
                                            <input type="text" name="price" value="{{ $price }}" class="form-control {{ $errCls }}">
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('qty') == true ? 'is-invalid' : ''; @endphp
                                            <label for="quantity">Quantity</label>
                                            <input type="number" min="1" name="quantity" value="{{ $quantity }}" class="form-control {{ $errCls }}">
                                            @error('quantity')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('stock') == true ? 'is-invalid' : ''; @endphp
                                            <label for="stock">Stock</label>
                                            <input type="text" name="stock" value="{{ $stock }}" class="form-control {{ $errCls }}">
                                            @error('stock')
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
                                    <span class="text">Update Product</span>
                                </button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection