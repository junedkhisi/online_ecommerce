@extends('home')

@section('content')
    <div class="container-fluid bg-light-gray container-view">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Transaction History Detail <i class="fa fa-shopping-cart"></i></h3>
            </div><br>
            <div class="card">
                <div class="card-header">
                    <table class="table table-sm text-center table-border">
                        <thead class="tborder">
                            <tr>
                                <td scope="col"><b>Name</b></td>
                                <td scope="col"><b>Quantity</b></td>
                                <td scope="col"><b>Price</b></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($details as $detail)
                                <tr class="tborder">
                                    <td>{{ $detail->product->name }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->product->total_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <b>
                        <div class="text-end">Total : ₹ {{ $grandtotal }}</div>
                    </b>
                </div>
            </div>
            <tr>
                <td>
                    <a type="button" href="{{ route('history-transaction') }}"
                        class="btn btn-primary btn-block mt-4 mx-auto">Back
                    </a>
                </td>
            </tr>

        </div>
    </div>
@endsection
