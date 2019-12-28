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

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="portfolio">Strony</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ust-portfolio">Ust. portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="uzytkownicy">Użytkownicy</a>
                        </li>
                    </ul>

                    <div class="button-section">
                        <a href="{{ route("portfolio.create") }}">
                            <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nowa strona</button>
                        </a>
                    </div>

                    @if (count($websites) === 0)

                        <div class="mt-4">
                            <p>{{ __('No websites added.') }}</p>
                        </div>

                    @else
                        @foreach($websites as $website)
                            <div class="card margin">
                                <div class="website_card">
                                    <div class="image" style="background-image: url('{{ asset("/storage/".$website->screenshot) }}');"></div>
                                    <div class="other_info">
                                        <div class="title"><a href="{{ $website->url }}" target="_blank">{{ $website->title }}</a></div>
                                        <div class="description">{{ $website->desc }}</div>
                                        <div class="used_tools">{{ $website->used_tools }}</div>
                                        <div class="options">
                                            <a href="{{ route("portfolio.show", [ 'website' => $website->id ]) }}"><button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Edytuj</button></a>
                                            <button type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cofnij publikację</button>
                                            <form style="display: inline-block;" action="{{ route('portfolio.destroy', [ 'website' => $website->id ]) }}" method="POST">
                                                @csrf {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm" id="website-del"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Usuń</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
