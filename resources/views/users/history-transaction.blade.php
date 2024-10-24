@extends('home')

@section('content')
    <div class="container-fluid bg-light-gray container-view">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-center">Transaction History <i class="fa fa-history" aria-hidden="true"></i></h3clas>
            </div>
            <div class="card">
                <div class="card-header">
                    <table class="table text-center table-border">
                        <thead class="tborder">
                            <tr>
                                {{-- <td scope="col"><b>Id</b></td> --}}
                                <td scope="col"><b>Email</b></td>
                                <td scope="col"><b>Date</b></td>
                                <td scope="col"><b>Status</b></td>
                                <td scope="col"><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($headers as $header)
                                <tr class="tborder">
                                    {{-- <td>{{ $header->id }}</td> --}}
                                    <td>{{ $header->user->email }}</td>
                                    <td>{{ $header->date }}</td>
                                    <td>{{ $header->status }}</td>

                                    <td>
                                        <form action="{{ route('transaction-detail', $header->id) }}"
                                            method="post"class="container-view" enctype="multipart/form-data">
                                            {{-- {{ csrf_field() }} --}}
                                            @csrf
                                            <div class="row  justify-content-center mb-2 ml-5">
                                                <input type="submit" class="btn btn-primary btn-block" value="Detail">
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <br><br>
                </div>
            </div>
        </div>
    @endsection
