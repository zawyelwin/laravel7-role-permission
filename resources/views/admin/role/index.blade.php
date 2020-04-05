@extends('admin.layouts.app')

@section('content')

<div class="row">
  <div class="col-lg-12">

    @can('add_roles')
    <div class="mb-2">
      <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary ml-auto">
        <i class="fa fa-plus"></i> Add New Role
      </a>
    </div>
    @endcan

    @include('admin.layouts.flash')

    <div class="shadow card">
      <div class="card-header">
        <i class="fa fa-align-justify"></i> Users
      </div>
      <div class="card-body">
        <table class="table table-responsive-sm" id="state-table">

          <thead>
            <tr>
              <th>Role</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            @foreach($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>

              <td>
                @can('edit_roles')
                <a href="{{ route('roles.edit', $role->id) }}" class="text-warning mr-2">
                  <i class="fa fa-edit"></i> Edit
                </a>
                @endcan

                @can('delete_role')
                <delete-record id="{{ $role->id }}" url="/admin/roles"></delete-record>
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