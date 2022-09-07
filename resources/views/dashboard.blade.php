@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            {{ __('DashBoard') }}
                        </div>

                        <div class="col-md-6">
                             <button><a href="{{ route('page/create') }}">Create New Page</a></button>
                        </div>
                    </div>
                </div>

                <div class="section" >
                    <form method="POST" action="{{ route('post-creation') }}">
                        @csrf
                        <div class="row mb-10">
                            <label for="content" class="col-md-2 col-form-label text-md-end">{{ __('CREATE') }}</label>

                            <div class="col-md-8">
                                <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" placeholder="Whats on your mind" required autocomplete="content" autofocus>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post') }}
                                </button>
                            </div>
                        </div>    
                    </form>      
                </div>     

                <div class="card-body">
                    <div><h1>You are loged in </h1></div>
                    <br>
                    

                    <div>
                        <div>Post</div>
                        <hr>

                      @foreach($post as $data)
                        <div class="row mb-10"> 
                            <h3> Created By: {{$data->creater_id}}</h3>

                            <h2>{{$data->content}}</h2>
                        </div>     
                      @endforeach
                    </div>
                    <br>

                    <div>
                        <div>Post from Page</div>
                        <hr>
                      @foreach($pagePost as $data)
                        <div class="row mb-10"> 
                            <h3> Created By: {{$data->creater_id}}</h3>

                            <h2>{{$data->content}}</h2>
                        </div>
                      @endforeach
                    </div>
                    
                </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
