@extends('home')

@section('content')
    <div class="container bg-light-gray">

        <div class="container">

            <div class="row">
                <h3>Phone List</h3>
            </div>

        </div>

        <div class="container p-5">
            <div class="row">

                @foreach($products as $product)

                    <div class="col-md-3 p-4">
                        <img src="{{asset('img/'.$product->image) }} " alt="card-1" class="card-img-top" style="width: 200px; height: 210px;"></a>

                        <div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">${{$product->price}}</div>

                        <a href="{{'product/'.$product->id}}" value="1" class="btn btn-danger" role="button"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add To Cart</a>
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
