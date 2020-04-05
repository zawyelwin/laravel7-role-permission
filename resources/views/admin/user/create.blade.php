@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Create New User
            </div>
            <form class="form-horizontal" action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="card-body">
                    @include('admin.layouts.flash')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Name</label>
                        <div class="col-md-4">
                            <input class="form-control" name="name" value="{{ old('name') }}" required autofocus
                                autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="email">Email</label>
                        <div class="col-md-4">
                            <input class="form-control" name="email" type="email" value="{{ old('email') }}" required
                                autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="password">Password</label>
                        <div class="col-md-4">
                            <input class="form-control" name="password" type="password" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="password_confirmation">Password Confirmation</label>
                        <div class="col-md-4">
                            <input class="form-control" name="password_confirmation" type="password" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="role">Role</label>
                        <div class="col-md-4">
                            <select class="form-control" autofocus required name="role[]" id="select-role">
                                <option value="">Choose Role...</option>
                                @foreach($roles as $role)
                                <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <button class="btn btn-success" type="submit">
                        <i class="fas fa-paper-plane"></i> Submit
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection


@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UserRequest'); !!}
<script>
    $('#select-role').selectize({
          maxItems: 10,
        });
</script>
@endsection