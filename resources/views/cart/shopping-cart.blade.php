{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom styles -->
</head>

<body>
    <header class="bg-light p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">Your Logo</div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                </ul>
            </nav>
            <div class="search-cart">
                <input type="text" class="form-control" placeholder="Search..." style="width: 200px;">
                <a href="/cart" class="btn btn-outline-secondary ml-2">🛒</a>
            </div>
        </div>
    </header>

    <nav class="breadcrumb bg-light p-2">
        <div class="container">
            <a href="/">Home</a> > <a href="/categories">Category</a> > <span>Men's Shoes</span>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Men's Shoes</h1>

        <div class="row">
            @foreach ($category->products as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('assets/dist/images/download.jpeg') }}" class="card-img-top" alt="{{ $product->description }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <button class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>

    <footer class="bg-light p-3 mt-4">
        <div class="container text-center">
            <p>About Us | Privacy Policy | Terms of Service</p>
            <div class="social-media">
                <!-- Social Media Links -->
            </div>
            <form class="form-inline justify-content-center mt-2">
                <input type="email" class="form-control mr-2" placeholder="Subscribe to our newsletter">
                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
 --}}
@extends('home')

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
    @if (count($carts) > 0)
        <div class="container-fluid bg-light-gray container-view">

            <div class="container">
                <div class="row justify-content-center">
                    <h3>Your Cart<i class="fas fa-shopping-cart"></i></h3>
                </div>

                <div class="card">
                    <div class="card-header">
                        <table class="table table-sm text-center table-border" id="shopping-cart">
                            <thead class="tborder">
                                <tr>
                                    <th scope="col" class="text-center">Id</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr class="tborder">
                                        <td>{{ $cart->id }}</td>
                                        <td><img src="{{ asset($cart->image) }}" target="_blank" alt="card-1"
                                                class="card-img-top" style="height: 50px;width: 50px"></td>
                                        <td>{{ $cart->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->price }}</td>


                                        {{-- <td>
                                            <a href="{{ route('remove-cart') }}" data-id="{{ $cart->id }}"class="btn btn-danger"
                                                role="button">Delete</a>
                                        </td> --}}

                                        <td>
                                            <button class="btn btn-danger delete-cart" data-id="{{ $cart->id }}"
                                                role="button">Delete</button>
                                        </td>

                                    </tr>
                                @endforeach

                                <table class="table-sm text-center table-border justify-content-end ">
                                    <tr>
                                        <th scope="border-right">
                                        <td>
                                            <h5>Total <br>Quantity: {{ $totalQty }}</h5>
                                        </td>

                                        <td class="border-right">
                                            <h5>Grand Total: <br> {{ $totalPrice }} </h5>
                                        </td>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="border-right">
                                        <td>
                                            <h4>Input Payment:<br> {{ $totalPrice }}</h4>
                                        </td>
                                        </th>
                                    </tr>
                                </table>
                            </tbody>
                        </table>
                        {{-- <form action="{{ route('checkout', Auth::user()->id) }}" method="post"
                            class="container-view" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                            <tr>
                                <td><input type="submit" href="{{ route('checkout', Auth::user()->id) }}" class="btn btn-primary btn-block  mx-auto"
                                        value="Complete the Payment"></td>
                            </tr>

                        </form> --}}
                        <td><input type="submit" href="{{ route('checkout', Auth::user()->id) }}" class="btn btn-primary btn-block  mx-auto"
                            value="Complete the Payment"></td>
                    </div>
                </div>
                <td><a type="button" href="{{ route('phone-list') }}"
                        class="btn btn-success btn-block  mt-4 mx-auto">Back</a></td>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>

                <div class="col-md-4 col-sm-4 col-xs-12 container-view text-center">
                    <h3>Your cart has no item!<i class="fas fa-shopping-cart"></i></h3>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12"></div>

            </div>
        </div>
    @endif
    <script>
        $(document).on('click', '.delete-cart', function(e) {

            var id = $(this).data('id');
            console.log("Deleting product with ID:", id);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('remove-cart', '') }}`,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            id: id
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                $('#shopping-cart').DataTable().ajax
                                    .reload(); // Reload data table
                            });
                        },
                        error: function(xhr) {

                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the item.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>

@endsection
