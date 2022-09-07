@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Page') }}</div>


                <div class="card-body">
                    <div>Page Name: {{$page->page_name}}</div>
                    <div>Page id: {{$page->id}}</div>

                    <form method="POST" action="{{ URL::to('page-post-creation/'. $page->id) }}">
                        @csrf
                        <div class="row mb-10">
                            <label for="content" class="col-md-2 col-form-label text-md-end">{{ __('CREATE Post') }}</label>

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
            </div>
        </div>
    </div>
</div>
@endsection
