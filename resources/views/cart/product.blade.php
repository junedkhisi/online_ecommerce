
@extends('home')

@section('content')
    <div class="container-fluid bg-light-gray container-view">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>

            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="background-box p-2 ">
                    <h2>{{$product->name}}</h2>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <img src="{{ asset('img/' . $product->image ) }}" alt="card-1" class="card-img-top" style="width: 200px; height: 200px;"><br><br>
                            <p>Description:</p>
                            <p>{{$product->description}}</p>

                            <div class="col-md-8">
                                <div class="row">
                                    <form action="/add/{{$product->id}}" method="post" class="container-view" enctype="multipart/form-data">
                                        {{csrf_field()}}


                                        <div class="form-group form-inline ml-2">
                                            <label for="qty">Qty: </label>
                                            <input type="text" class="form-control ml-2 w-25" name="qty" placeholder="1">
                                            <div class="row w-75 justify-content-center mt-3 ml-5">
                                                <input type="submit" class="btn btn-danger btn-block" value="Add to Cart">
                                            </div>
                                        </div>
                                    </form>


                                    <form action="{{ route('insert-comment') }}" method="post" class="container-view" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <input type="hidden" name="product_id" value="{{$product->id}}">

                                        <div class="form-group form-inline ml-2">
                                            <label for="comment">Comment: </label>
                                            <input type="text" class="form-control ml-2" name="comment" placeholder="Your Comment Here">

                                            <div class="row w-75 justify-content-center mt-2 ml-5 mb-5">
                                                <input type="submit" class="btn btn-danger btn-block" value="Insert Comment">
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="row"> </div>
                            <div class="row">
                                <div class="row"></div>
                                <div class="col-md-12">
                                    {{--brand--}}
                                    <table class="table-sm text-center table-borderless">
                                        <tr>
                                            <th scope="row">
                                            <td class="border-right">
                                                <p>Brand: {{$product->brand}}</p>
                                            </td>

                                            <td class="border-right">
                                                <p>Price: {{$product->price}}</p>
                                            </td>

                                            <td class="border-right">
                                                <p>Stock: {{$product->stock}}</p>
                                            </td>
                                            </th>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered">
                                        <div class="comments-list">
                                            <p>Comments</p>
                                            <div class="border-bottom"></div>

                                            @foreach($comments as $comment)
                                                <div class="row ml-2">
                                                    <div class="text-left pr-5">{{ $comment->user->email }}</div>
                                                    <div class="text-right">{{$comment->date}}</div>
                                                </div>
                                                <div class="ml-2">{{$comment->comment}}</div><br>
                                            @endforeach
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-sm-2 col-xs-12"></div>
        </div>
    </div>
@endsection
