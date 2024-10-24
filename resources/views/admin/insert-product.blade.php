@extends('home')

@section('content')
    {{-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>

            <div class="col-md-6 col-sm-6 col-xs-12 ">
                <form class="form-container" method="POST" action="{{ route('insert-product') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <h1>Create Product <i class="fa fa-mobile" aria-hidden="true"></i></h1>

                    <div class="form-group">
                        <div class="row">
                            <label for="name" class="col-md-2 control-label">Name</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <div class="row">
                            <label for="brand" class="col-md-2 control-label">Brand</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="brand" type="text" class="form-control" name="brand"
                                    value="{{ old('brand') }}" required>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <div class="row">
                            <label for="description" class="col-md-2 control-label">Description</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="description" type="text" class="form-control" name="description"
                                    value="{{ old('description') }}" required autofocus>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <div class="row">
                            <label for="price" class="col-md-2 control-label">Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <span class="fas fa-dollar-sign position-absolute icon-position mr-5 mt-3"
                                    style="margin-left: 1rem"></span>
                                <input id="price" type="text" class="form-control ml-5 col-md-10" name="price"
                                    value="{{ old('price') }}" required autofocus oninput="calculateTotal()">

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                        <div class="row">
                            <label for="discount" class="col-md-2 control-label">Discount (%)</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="discount" type="text" class="form-control mr-3 col-md-11" name="discount"
                                    value="{{ old('discount') }}" required oninput="calculateTotal()">
                                <span class="fas fa-percentage position-absolute icon-position mt-3"></span>

                                @if ($errors->has('discount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label for="total_price" class="col-md-2 control-label">Total Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="total_price" type="text" class="form-control" name="total_price"
                                    value="{{ old('total_price') }}" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
                        <div class="row">
                            <label for="stock" class="col-md-2 control-label">Stock</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="stock" type="text" class="form-control" name="stock"
                                    value="{{ old('stock') }}" required autofocus>

                                @if ($errors->has('stock'))
                                    <span class="help-block"><strong>{{ $errors->first('stock') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <label for="image" class="col-md-4 control-label">Image</label>
                                <input id="image" type="file" class="form-control pb-5" name="image" required
                                    onchange="previewImage(event)">
                                <img id="imagePreview" src="" alt="Image Preview"
                                    style="display: none; max-width: 100px; height: 100px; margin-top: 10px;">

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" style="margin-left: 18rem" value="Submit">
                </form>
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <form class="form-container" method="POST" action="{{ route('insert-product') }}"
                    enctype="multipart/form-data">
                    {{-- {{ csrf_field() }} --}}
                    @csrf
                    <h1>Create Product <i class="fa fa-" aria-hidden="true"></i></h1>

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ old('name') }}" required placeholder="Please Enter Product Name" autofocus>
                        </div>
                    </div>

                    <!-- Brand Field -->
                    <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label for="brand" class="col-md-2 control-label">Brand</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="brand" type="text" class="form-control" name="brand"
                                value="{{ old('brand') }}" required placeholder="Please Enter Brand">
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-2 control-label">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="description" type="text" class="form-control" name="description"
                                value="{{ old('description') }}" placeholder="Please Enter Description" required>
                        </div>
                    </div>

                    <!-- Image Field -->
                    <div class="form-group">
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <label for="image" class="col-md-4 control-label">Image</label>
                            <input id="image" type="file" class="form-control pb-5" name="image" required
                                onchange="previewImage(event)">
                            <img id="imagePreview" src="" alt="Image Preview"
                                style="display: none; max-width: 100px; height: 100px; margin-top: 10px;">
                        </div>
                    </div>

                    <!-- Price and discount Field -->
                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-md-4 pr-1">
                                <label for="price" class="col-md-4 control-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price"
                                    value="{{ old('price') }}" placeholder="Price" oninput="calculateTotal()">
                            </div>

                            <div class="form-group col-md-4 pl-1">
                                <label for="discount" class="col-md-4 control-label">Discount </label>
                                <input type="number" class="form-control" name="discount" id="discount"
                                    value="{{ old('discount') }}" placeholder="Discount" oninput="calculateTotal()">
                            </div>
                        </div>
                    </div>

                    <!-- Total Price and stock Field -->
                    <div class="form-group">
                        <div class="row">
                            <div class="form-group col-md-4 pl-1 pr-1">
                                <label for="total_price" class="col-md-4 control-label">Total Price</label>
                                <input type="text" class="form-control" name="total_price" id="total_price"
                                    value="{{ old('total_price') }}" placeholder="Total Price" readonly>
                            </div>

                            <div class="form-group col-md-4 pl-1">
                                <label for="stock" class="col-md-4 control-label">Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ old('stock') }}"
                                    placeholder="Stock">
                            </div>
                        </div>
                    </div><br>
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                </form>
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
            </div>
        </div>
    </div>
    <style>
        .error {
            color: red;
        }
    </style>
    <script>
        function calculateTotal() {
            const price = parseFloat(document.getElementById('price').value) || 0; // Get price value
            const discount = parseFloat(document.getElementById('discount').value) || 0; // Get discount value

            // Calculate total price and discount
            const totalPrice = price - (price * (discount / 100));
            document.getElementById('total_price').value = totalPrice.toFixed(2); // Update total price
        }
    </script>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block'; // Show the image
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.style.display = 'none'; // Hide the image if no file is selected
            }
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
                    },
                    image: {
                        required: true,
                        extension: "jpg,jpeg,png,gif"
                    }
                },
                messages: {
                    name: {
                        required: "Please Enter The Product Name.",
                        minlength: "Name Must Be At Least 3 Characters Long."
                    },
                    brand: {
                        required: "Please Enter The Brand.",
                        minlength: "Brand Must Be At Least 2 Characters Long."
                    },
                    description: {
                        required: "Please Enter a Description.",
                        minlength: "Description Must Be At Least 10 Characters Long."
                    },
                    price: {
                        required: "Please Enter a Price.",
                        number: "Please Enter a Valid Number.",
                        min: "Price Must Be a Positive Number."
                    },
                    discount: {
                        required: "Please Enter a Discount.",
                        number: "Please Enter a Valid Number.",
                        min: "Discount Must Be At Least 0.",
                        max: "Discount Cannot Exceed 100."
                    },
                    stock: {
                        required: "Please Enter The Stock Quantity.",
                        number: "Please Enter a Valid Number.",
                        min: "Stock Must Be At Least 0."
                    },
                    image: {
                        required: "Please Upload The Image",
                        extension: "Please Upload a File In JPG, JPEG, PNG, Or GIF Format."
                    }
                },
                submitHandler: function(form) {
                    form.submit(); // Submit the form when valid
                }
            });
        });
    </script>
@endsection
