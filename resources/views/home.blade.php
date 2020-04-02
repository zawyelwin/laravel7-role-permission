@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-8">
                <div class="shadow card">
                    <div class="card-header">Dashboard</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
