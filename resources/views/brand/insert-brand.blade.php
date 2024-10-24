@extends('home')

@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" <div class="panel-body">
                    <h2 class="text-center" style="margin-right: 25rem">Insert Brand</h2>
                    <div class="container">
                        <form class="form-horizontal" method="POST" action="{{ route('insert-brand') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 12rem  ">
                                        Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
