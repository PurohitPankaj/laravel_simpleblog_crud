{{-- Display session msg, errors  like validation or any other --}}
@if ($errors->any())
    <div class="alert alert-danger mt-3 mb-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (\Session::has('success'))
         <div class="alert alert-success mt-3 mb-3">
            <h6 style=" text-align:center !important;"><b>Success! </b>{!! \Session::get('success') !!}</h6>
        </div>
@endif

@if (\Session::has('msg'))
         <div class="alert alert-info mt-3 mb-3">
            <h6 style=" text-align:center !important;"><b></b>{!! \Session::get('msg') !!}</h6>
        </div>
@endif

