@if ($errors->any())
    <div class="alert alert-danger alert-block" id="alert">
        <button type="button" class="close text-danger" data-dismiss="alert">×</button>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
    </div>
@endif

{{-- @if ($message = session()->get('success'))
    <div class="alert alert-success alert-block" id="alert">
        <button type="button" class="close text-success" data-dismiss="alert">×</button>
            <li>{{ $message }} </li>
    </div>
@endif --}}


@if ($error = session()->get('error'))
    <div class="alert alert-danger alert-block" id="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <li>{{ $error }} </li>
    </div>
@endif

