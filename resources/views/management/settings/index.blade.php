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

                    @include('management.nav')

                    @if (count($settings) === 0)

                        <div class="mt-4">
                            <p>{{ __('No settings provided.') }}</p>
                        </div>

                    @else
                        @foreach($settings as $setting)
                            <div class="card margin">
                                <form method="POST">
                                    @csrf

                                    @method('PATCH')

                                    <input type="hidden" name="id" value="{{ $setting->id }}" />

                                    <div class="form-group row mt-3">
                                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $setting->title }}" autofocus>
                                            @error ('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subtitle_en" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle English') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" id="subtitle_en" class="form-control @error('subtitle_en') is-invalid @enderror" name="subtitle_en" value="{{ $setting->subtitle_en }}" autofocus>
                                            @error ('subtitle_en')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subtitle_pl" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle Polish') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" id="subtitle_pl" class="form-control @error('subtitle_pl') is-invalid @enderror" name="subtitle_pl" value="{{ $setting->subtitle_pl }}" autofocus>
                                            @error ('subtitle_pl')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mail" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>

                                        <div class="col-md-6">
                                            <input type="text" id="mail" class="form-control @error('mail') is-invalid @enderror" name="mail" value="{{ $setting->mail }}" autofocus>
                                            @error ('mail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-md-6">
                                            <button type="submit" class="btn btn-primary">{{ __('Save settings') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
