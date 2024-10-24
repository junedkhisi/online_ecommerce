
@extends('home')

@section('content')
    <div class="container-fluid bg-light-gray container-view">

        <div class="container">

            <div class="row justify-content-center">
                <h3>Transaction History Detail <i class="fas fa-shopping-cart"></i></h3>
            </div>

            <table class="table table-sm text-center table-borderless">
                <thead class="tborder">
                <tr>
                    <td scope="col"><b>Phone Name</b></td>
                    <td scope="col"><b>Price</b></td>
                    <td scope="col"><b>Quantity</b></td>
                </tr>
                </thead>

                <tbody>
                    @foreach($details as $detail)
                        <tr class="tborder">
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->price }}</td>
                        <td>{{ $detail->quantity }}</td>
                    @endforeach
                </tbody>
            </table>

            <tr>
                <td><a type="button" href="" class="btn btn-primary btn-block w-50 mt-4 mx-auto">Back</a></td>
                {{-- <td><a type="button" href="{{ route('history-transaction') }}" class="btn btn-primary btn-block w-50 mt-4 mx-auto">Back</a></td> --}}
            </tr>
        </div>
    </div>
@endsection
