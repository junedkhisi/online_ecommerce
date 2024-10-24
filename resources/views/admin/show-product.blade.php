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
    <div id="preloader" class="uk-overlay-primary uk-position-cover">
        <div class="uk-position-center">
            <span uk-spinner="ratio: 2"></span>
        </div>
    </div>
    <div class="container bg-light-gray">
        <h3 class="text-center">Product <i class="fa fa-product-hunt" aria-hidden="true"></i></h3>
        <a href="{{ url('insert-product') }}">
            <button style="float: right" class="btn btn-success ml-2"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </a><br><br>
        <div class="card" style="background-color:azure">
            <div class="card-header">
                <div class="container mt-4 ml-5 mr-5 mb-0 pb-0">
                    <div class="row">
                        <table class="table table-striped" id="products-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Total Price</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('show-product') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'brand',
                        name: 'brand'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });
        });
        $(document).on('click', '.delete-product', function() {
            var id = $(this).data('id');
            console.log("Deleting product with ID:", id); // Debugging line
            Swal.fire({
                title: 'Are you sure ?',
                text: "You must delete this product",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete It!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete-product', '') }}",
                        type: 'POST',
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
                                $('#products-table').DataTable().ajax
                                    .reload(); // Reload data table
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", error); // Debugging line
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again.',
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(function() {
            setTimeout("$('#preloader').fadeOut('slow')", 500)
        })
    </script>
@endsection
