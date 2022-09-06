@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DashBoard') }}</div>

                <div class="text-center">
                     <button><a href="{{ route('page/create') }}">Create New Page</a></button>
                </div>
                <div class="card-body">
                    <div><h1>You are loged in </h1></div>
                    <br>
                    
                </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
