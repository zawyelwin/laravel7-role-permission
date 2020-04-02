@extends('admin.layouts.app')

@section('content')

    <div class="row">
      <div class="col-lg-12">
        <div class="shadow card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> Add New Role
            </div>
            <form class="form-horizontal" action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="card-body">
                    @include('admin.layouts.flash')

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="name">Role Name</label>
                        <div class="col-md-4">
                        <input class="form-control" name="name" value="{{ old('name') }}" required autofocus autocomplete="off" >
                        </div>
                    </div>

                    <span class="font-weight-bold">Manage Permissions</span>
                    <hr>

                    <div class="form-group row">
                        <span class="mr-3 ml-2 font-weight-bold">All Permissions</span>
                        <label class="c-switch c-switch-3d c-switch-primary">
                            <input class="c-switch-input" type="checkbox" id="checkall">
                            <span class="c-switch-slider"></span>
                        </label>
                    </div>

                    <div class="form-group row">
                        @foreach($permissions as $permission)
                          <div class="custom-control custom-switch mb-3 col-md-3">
                            <input type="checkbox" class="custom-control-input chk" name="permission[]" id="{{$permission->id}}" value="{{ $permission->id }}">

                            <label class="custom-control-label ml-2" for="{{$permission->id}}">
                                {{ str_replace('_', ' ', $permission->name) }}
                            </label>

                          </div>
                        @endforeach
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
    $("#checkall").click(function (){
        if ($("#checkall").is(':checked')){
           $(".chk").each(function (){
              $(this).prop("checked", true);
              });
           }else{
              $(".chk").each(function (){
                   $(this).prop("checked", false);
              });
           }
    });
</script>

@endsection