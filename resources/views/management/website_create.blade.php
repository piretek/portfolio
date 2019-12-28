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
                        <form style="width: 100%;" method="POST" action="{{ route('portfolio.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Website title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('URL') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autofocus>
                                    @error ('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="desc" style="min-height: 60px;" class="form-control @error('desc') is-invalid @enderror" rows="3" name="desc">{{ old('description') }}</textarea>
                                    @error ('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Used tools') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="url" class="form-control @error('used_tools') is-invalid @enderror" name="used_tools" value="{{ old('used_tools') }}" autofocus>
                                    @error ('used_tools')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('Screenshot') }}</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('screenshot') is-invalid @enderror" id="screenshot" name="screenshot">

                                    @error ('screenshot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"> {{ __('Add new website') }} </button>
                                    <a href="{{ route('portfolio.index') }}"><button type="button" class="btn btn-light"> {{ __('Back') }} </button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
