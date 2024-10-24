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
    <div class="container">
        <div class="row">
            <h3 class="text-center"> List <i class="fa fa-list-alt" aria-hidden="true"></i></h3>
        </div>
    </div>
    <div class="container" style="background-color: lightcoral">

        <div class="container p-5">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 p-4">
                        <img src="{{ asset($product->image) }}" alt="card-1" class="card-img-top"
                            style="width: 100px; height: 110px;"></a>
                        <div class="product-name">{{ $product->name }}</div></a>
                        <div class="product-total_price">₹{{ $product->total_price }}</div>

                        {{-- <a href="{{route('product/' . $product->id)}}"  class="btn btn-danger" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a> --}}
                        <a href="{{ route('product', $product->id) }}" class="btn btn-success" role="button">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
