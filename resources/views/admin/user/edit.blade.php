@extends('admin.layouts.app')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Edit User <span class="text-danger"> {{ $user->name }}</span>
            </div>
            <form class="form-horizontal" action="{{ route('users.update',$user->id) }}" method="post">
               @method('patch') @csrf
                <div class="card-body">
                    @include('admin.layouts.flash')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Name</label>
                        <div class="col-md-4">
                        <input class="form-control" name="name" value="{{ $user->name }}" required autofocus >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="email">Email</label>
                        <div class="col-md-4">
                            <input class="form-control" name="email" type="email" value="{{ $user->email }}" required autofocus >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="role">Role</label>
                        <div class="col-md-4">
                          <select class="form-control" autofocus required name="role[]" id="select-state" multiple>
                              <option value="">Choose Role...</option>
                              @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->roles()->pluck('id')->contains($role->id) ? 'selected' : '' }}
                                    >
                                    {{ $role['name'] }}
                                </option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <a class="text-primary h5" data-toggle="collapse" href="#updatePassword" role="button" aria-expanded="false" aria-controls="updatePassword">
                        Update Password
                    </a>

                        <div id="updatePassword" class="collapse">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="password">Password</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password"  autofocus>
                                </div>
                            </div>

                        
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="password_confirmation">Confirm Password</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control" name="password_confirmation"  autofocus>
                                </div>
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


@section('script')
    <script>
        $('#select-state').selectize();
    </script>
@endsection