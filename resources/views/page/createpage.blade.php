@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Crate Page') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('page-creation') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="page_name" class="col-md-4 col-form-label text-md-end">{{ __('page name') }}</label>

                            <div class="col-md-6">
                                <input id="page_name" type="text" class="form-control @error('page_name') is-invalid @enderror" name="page_name" value="{{ old('page_name') }}" required autocomplete="page_name" autofocus>

                                @error('page_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="page_info" class="col-md-4 col-form-label text-md-end">{{ __('page info') }}</label>

                            <div class="col-md-6">
                                <input id="page_info" type="text" class="form-control @error('page_info') is-invalid @enderror" name="page_info" value="{{ old('page_info') }}" required autocomplete="name" autofocus>

                                @error('page_info')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>

                        </div>
                        <br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    <a style="color: white" href="{{ route('dashboard') }}">Return Dashboard</a>
                                    
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
