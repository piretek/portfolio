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

                    <div class="row">
                        <div class="form-group offset-md-2 col-md-10">
                            <h2>Add new website</h2>
                        </div>

                        @include('management.websites.form', ['edit' => false])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
