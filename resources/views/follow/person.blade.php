@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Page') }}</div>


                <div class="card-body">
                   
                    <form method="POST" action="{{URL::to('follow-person/'. $person->id) }}">
                        @csrf
                        <div class="row mb-10">

                            <div class="col-md-6">
                                <label for="person" class="col col-form-label text-md-end">{{$person->first_name}} {{$person->last_name}} </label>
                            </div>

                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Follow') }}
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
