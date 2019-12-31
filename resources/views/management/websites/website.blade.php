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
                    <div class="card mb-4">
                        <div class="website_card">
                            <div class="image" style="background-image: url('{{ asset("/storage/".$website->screenshot) }}');"></div>
                            <div class="other_info">
                                <div class="title"><a href="{{ $website->url }}" target="_blank">{{ $website->title }}</a></div>
                                <div class="description">{{ $website->desc }}</div>
                                <div class="used_tools">{{ $website->used_tools }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-md-2 col-md-10">
                        <h2>Edit website</h2>
                    </div>
                    @include('management.websites.form', ['edit' => true])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
