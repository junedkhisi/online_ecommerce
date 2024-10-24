@extends('home')

@section('content')
    <div class="container bg-light-gray">

        <div class="container">
            <div class="row">
                <h3> List</h3>
            </div>
        </div>

        <div class="container p-5">
            <div class="row">

                @foreach ($products as $product)
                    <div class="col-md-3 p-4">
                        <img src="{{ asset('img/' . $product->image) }}" alt="card-1" class="card-img-top"
                            style="width: 200px; height: 200px;">
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-price">${{ $product->price }}</div>
                        <form action="{{ route('add/', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart
                            </button>
                        </form>
                    </div>
                @endforeach

            </div>



            <tr>
                <td><a type="button" href="" class="btn btn-info btn-block w-25 mt-4 mx-auto">Back</a></td>
            </tr>

            <br><br>

        </div>
    </div>
@endsection
