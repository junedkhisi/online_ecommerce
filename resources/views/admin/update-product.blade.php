@extends('home')

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <form class="form-container" method="POST" action="{{ url('update-product') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h1>Update Product <i class="fa fa-product" aria-hidden="true"></i></h1>

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', $product->name) }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label for="brand" class="col-md-4 control-label">Brand</label>
                        <div class="col-md-6">
                            <input id="brand" type="text" class="form-control" name="brand"
                                value="{{ old('brand', $product->brand) }}" required>
                            @if ($errors->has('brand'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('brand') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea id="description" class="form-control" name="description" required autofocus>{{ old('description', $product->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="image" class="col-md-4 control-label">Image</label>
                            <input id="image" type="file" class="form-control" name="image"
                                onchange="previewImage(event)">
                            <img id="imagePreview" src="{{ asset('' . $product->image) }}" alt="Image Preview"
                                style="display: {{ $product->image ? 'block' : 'none' }}; max-width: 100px; height: 100px; margin-top: 10px;">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-md-4 pr-1">
                                <label for="price" class="col-md-4 control-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    value="{{ old('price', $product->price) }}" placeholder="Price"
                                    oninput="calculateTotal()">
                                <span class="fas fa-dollar-sign position-absolute icon-position"></span>
                            </div>

                            <div class="form-group col-md-4 pl-1">
                                <label for="discount" class="col-md-4 control-label">Discount </label>
                                <input type="text" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount', $product->discount) }}" placeholder="Discount"
                                    oninput="calculateTotal()">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-4 pl-1 pr-1">
                                    <label for="total_price" class="col-md-4 control-label">Total Price</label>
                                    <input type="text" class="form-control" name="total_price" id="total_price"
                                        value="{{ old('total_price', $product->price - $product->price * ($product->discount / 100)) }}"
                                        placeholder="Total Price" readonly>
                                </div>

                                <div class="form-group col-md-4 pl-1">
                                    <label for="stock" class="col-md-4 control-label">stock</label>
                                    <input type="text" class="form-control" name="stock"
                                        value="{{ old('stock', $product->stock) }}" placeholder="Stock">
                                </div>
                            </div>
                        </div><br>
                        <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form class="form-container" method="POST" action="{{ url('update-product') }}" enctype="multipart/form-data">
                    {{-- {{ csrf_field() }} --}}
                    @csrf
                    <h1>Update Product <i class="fa fa-product" aria-hidden="true"></i></h1>
                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <!-- Name Field -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name', $product->name) }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Brand Field -->
                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label for="brand" class="col-md-4 control-label">Brand</label>
                        <div class="col-md-6">
                            <input id="brand" type="text" class="form-control" name="brand"
                                value="{{ old('brand', $product->brand) }}" required>
                            @if ($errors->has('brand'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('brand') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            <textarea id="description" class="form-control" name="description" required>{{ old('description', $product->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Image Field -->
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="image" class="col-md-4 control-label">Image</label>
                            <input id="image" type="file" class="form-control" name="image"
                                onchange="previewImage(event)">
                            <img id="imagePreview" src="{{ asset('' . $product->image) }}" alt="Image Preview"
                                style="display: {{ $product->image ? 'block' : 'none' }}; max-width: 100px; height: 100px; margin-top: 10px;">
                            @if ($errors->has('image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Price and Discount Fields -->
                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-md-4 pr-1">
                                <label for="price" class="col-md-4 control-label">Price</label>
                                <input type="text" class="form-control" name="price" id="price"
                                    value="{{ old('price', $product->price) }}" placeholder="Price">
                            </div>

                            <div class="form-group col-md-4 pl-1">
                                <label for="discount" class="col-md-4 control-label">Discount</label>
                                <input type="text" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount', $product->discount) }}" placeholder="Discount">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-4 pl-1 pr-1">
                                    <label for="total_price" class="col-md-4 control-label">Total Price</label>
                                    <input type="text" class="form-control" name="total_price" id="total_price"
                                        value="{{ old('total_price', $product->price - $product->price * ($product->discount / 100)) }}"
                                        placeholder="Total Price" readonly>
                                </div>

                                <div class="form-group col-md-4 pl-1">
                                    <label for="stock" class="col-md-4 control-label">Stock</label>
                                    <input type="text" class="form-control" name="stock"
                                        value="{{ old('stock', $product->stock) }}" placeholder="Stock">
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                </form>
            </div>
        </div>
    </div>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
            }
        }
    </script>
    <script>
        function calculateTotal() {

            const priceInput = document.getElementById('price');
            const discountInput = document.getElementById('discount');
            const totalInput = document.getElementById('total_price');


            const price = parseFloat(priceInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;


            const total_price = price - (price * (discount / 100));


            totalInput.value = total_price.toFixed(2);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        $(document).ready(function() {
            $(".form-container").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    brand: {
                        required: true,
                        minlength: 2
                    },
                    description: {
                        required: true,
                        minlength: 10
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 0
                    },
                    discount: {
                        required: true,
                        number: true,
                        min: 0,
                        max: 100
                    },
                    stock: {
                        required: true,
                        number: true,
                        min: 0
                    }
                },
                messages: {
                    name: {
                        required: "Please enter the product name.",
                        minlength: "Name must be at least 3 characters long."
                    },
                    brand: {
                        required: "Please enter the brand.",
                        minlength: "Brand must be at least 2 characters long."
                    },
                    description: {
                        required: "Please enter a description.",
                        minlength: "Description must be at least 10 characters long."
                    },
                    price: {
                        required: "Please enter a price.",
                        number: "Please enter a valid number.",
                        min: "Price must be a positive number."
                    },
                    discount: {
                        required: "Please enter a discount.",
                        number: "Please enter a valid number.",
                        min: "Discount must be at least 0.",
                        max: "Discount cannot exceed 100."
                    },
                    stock: {
                        required: "Please enter the stock quantity.",
                        number: "Please enter a valid number.",
                        min: "Stock must be at least 0."
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
