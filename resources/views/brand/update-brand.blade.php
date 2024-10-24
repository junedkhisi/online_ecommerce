@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Brand</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('update-brand') }}"
                            enctype="multipart/form-data">
                            {{-- {{ csrf_field() }} --}}
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name', $brand->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <input type="submit" class="btn btn-primary btn-block" value="Update">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
