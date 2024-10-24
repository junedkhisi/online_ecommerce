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
                    <h3 class="text-center">Your Cart List <i class="fa fa-shopping-cart" aria-hidden="true"></i></h3>

                     <form action="{{ route('checkout', Auth::user()->id) }}" method="POST" class="container-view"
                        enctype="multipart/form-data">
                        {{-- {{ csrf_field() }} --}}
                        @csrf
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                        <div>
                            <input type="submit" style="float: right" class="btn btn-primary btn-block  mx-auto"
                                value="Complete The Payment">
                            <h5>Total Quantity: {{ $totalQty }}</h5>
                            <h5>Total Price: {{ $totalPrice }}</h5>
                        </div>
                    </form><br><br>
                </div>
                <div class="card">
                    <div class="card-header">
                        <table class="table text-center table-border" id="shopping-cart">
                            <thead class="tborder">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </thead>
                        </table>
                    </div>
                </div>
                <a type="button" href="{{ route('phone-list') }}" class="btn btn-success btn-block mt-4 mx-auto">Back</a>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#shopping-cart').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('cart.data') }}', // Your route to fetch data
                    columns: [
                        {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'quantity',
                            name: 'quantity'
                        },
                        {
                            data: 'total',
                            name: 'total'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
            });
        </script>
    @else
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12"></div>

                <div class="col-md-4 col-sm-4 col-xs-12 container-view text-center">
                    <h3>Your Cart Has No Item! <i class="fa fa-shopping-cart" aria-hidden="true"></i></h3>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12"></div>

            </div>
        </div>
    @endif
    <script>
        $(document).on('click', '.delete-cart', function(e) {

            var id = $(this).data('id');
            console.log("Deleting product with ID:", id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Remove It!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('remove-cart', '') }}",
                        type: 'POST',
                        data: {
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
                                    .reload();
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
