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

            <div class="col-lg-8 mb-4">

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
                        <form action="{{ route('admin.orders.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @php $errCls = $errors->has('customer_id') == true ? 'is-invalid' : ''; @endphp
                                            <label for="customer_id">Select Customer</label>
                                            <select name="customer_id" class="form-control {{ $errCls }}">
                                                <option value="">-- Select Customer --</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>  
                                    
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Product Price</th>
                                                        <th>Qty</th>
                                                        <th>Product Price (Total)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($products as $product)
                                                    <tr>
                                                        <td>
                                                            <input class="_pidSelection" type="checkbox" name="products[{{ $loop->iteration }}][pid]" value="{{ $product->id }}" >
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>₹{{ $product->price }}</td>
                                                        <td>
                                                            <input name="products[{{ $loop->iteration }}][qty]" data-pid="{{ $product->id }}" class="__pQtyChange form-control" type="number" min="1" max="{{ $product->quantity }}" value="0" style="max-width:150px;" disabled /> 
                                                        </td>
                                                        <td class="product_total_tag">₹0</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="4" class="text-right">Bag Total :</td>
                                                        <td colspan="2" id="_bagTotal">₹0</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Create Order</span>
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

@section('scripts')

    <!-- Filters js  -->
    <script src="{{ asset('admin/js/order.js') }}"></script>


@endsection