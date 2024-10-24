@extends('home')
@section('content')
    <div class="container-fluid bg-light-gray container-view">

        <div class="container">

            <div class="row justify-content-center">
                <h3>Transaction History <i class="fas fa-shopping-cart"></i></h3>
            </div>

            <table class="table text-center table-borderless">
                <thead class="tborder">
                    <tr>
                        <td scope="col"><b>Email</b></td>
                        <td scope="col"><b>Date</b></td>
                        <td scope="col"><b>Status</b></td>
                        <td scope="col"></td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($headers as $header)

                        <tr class="tborder">
                            <td>{{ $header->user->email }}</td>
                            <td>{{ $header->date }}</td>
                            <td>{{ $header->status }}</td>

                            <td>
                                <form action="/history-detail/{{ $header->id }}" method="post" class="container-view"
                                    enctype="multipart/form-data">
                                    {{-- {{ csrf_field() }} --}}
                                    @csrf
                                    <div class="row w-50 justify-content-center mt-3 ml-5">
                                        <input type="submit" class="btn btn-primary btn-block" value="Detail">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <br><br>
        </div>
    </div>
@endsection
