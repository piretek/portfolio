@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome, ') }} {{ Auth::user()->username }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="mb-2 col-md-12 pl-0 pr-0">
                        <button type="submit" class="btn btn-primary"> {{ __('Update') }} </button>
                        <a href="{{ route('portfolio.index') }}"><button type="button" class="btn btn-light"> {{ __('Back') }} </button></a>
                    </div>
                    <div class="card">
                        <div class="website_card">
                            <div class="image" style="background-image: url('{{ asset("/storage/".$website->screenshot) }}');"></div>
                            <div class="other_info">
                                <div class="title"><a href="{{ $website->url }}" target="_blank">{{ $website->title }}</a></div>
                                <div class="description">{{ $website->desc }}</div>
                                <div class="used_tools">{{ $website->used_tools }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
