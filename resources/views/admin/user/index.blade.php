@extends('admin.layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12">

    @can('add_users')
    <div class="mb-2">
      <a href="{{ route('users.create') }}" class="btn btn-primary ml-auto">
        <i class="fa fa-plus"></i> Add New
      </a>
    </div>
    @endcan

    @include('admin.layouts.flash')

    <div class="shadow card ">

      <div class="card-header">
        <i class="fa fa-align-justify"></i> Users
      </div>

      <div class="card-body">
        <table class="table table-responsive-sm" id="state-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles()->pluck('name')->implode(' | ') }}</td>

              <td>
                @can('edit_users')
                <a href="{{ route('users.edit', $user->id) }}" class="text-warning mr-2">
                  <i class="fa fa-edit"></i> Edit
                </a>
                @endcan

                @can('delete_users')
                <delete-record id="{{ $user->id }}" url="/admin/users"></delete-record>
                @endcan
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>

@endsection