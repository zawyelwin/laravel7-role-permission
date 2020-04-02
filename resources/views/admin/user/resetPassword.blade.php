@extends('admin.layouts.app')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Change Password
            </div>
            <form class="form-horizontal" action="{{ route('password.change') }}" method="post">
            @method('patch') @csrf
                <div class="card-body">
                    
                @if ($message = session()->get('errors'))
                    <div class="alert alert-danger alert-block" id="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <li>{{$message}}</li>
                    </div>
                @endif

                @if ($message = session()->get('success'))
                    <div class="alert alert-success alert-block" id="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <li>{{ $message }} </li>
                    </div>
                @endif


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="current-password">Current Password</label>
                        <div class="col-md-4">
                            <input class="form-control" name="current-password" type="password" required autofocus >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="new-password">New Password</label>
                        <div class="col-md-4">
                            <input class="form-control" name="new-password" type="password" required autofocus >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="password_confirmation">Password Confirmation</label>
                        <div class="col-md-4">
                            <input class="form-control" name="new-password_confirmation" type="password" required autofocus >
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>
@endsection
