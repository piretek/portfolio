<form style="width: 100%;" method="POST" action="@if ($edit) {{ route('portfolio.edit', ['website' => $website->id] ) }} @else {{ route('portfolio.store') }} @endif" enctype="multipart/form-data">
    @csrf

    @if ($edit)

        @method('PUT')

    @endif
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Website title') }}</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="@if ($edit) {{ old('title') ?? $website->title }} @else {{ old('title') }} @endif" autofocus>

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
            <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" name="url" value="@if ($edit) {{ old('url') ?? $website->url }} @else {{ old('url') }} @endif" autofocus>
            @error ('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description PL') }}</label>

        <div class="col-md-6">
            <textarea id="desc_pl" style="min-height: 60px;" class="form-control @error('desc_pl') is-invalid @enderror" rows="3" name="desc_pl">@if ($edit) {{ old('desc_pl') ?? $website->desc_pl }} @else {{ old('desc_pl') }} @endif</textarea>
            @error ('desc_pl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="desc_en" class="col-md-4 col-form-label text-md-right">{{ __('Description EN') }}</label>

        <div class="col-md-6">
            <textarea id="desc_en" style="min-height: 60px;" class="form-control @error('desc_en') is-invalid @enderror" rows="3" name="desc_en">@if ($edit) {{ old('desc_en') ?? $website->desc_en }} @else {{ old('desc_en') }} @endif</textarea>
            @error ('desc_en')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="used_tools" class="col-md-4 col-form-label text-md-right">{{ __('Used tools') }}</label>

        <div class="col-md-6">
            <input type="text" id="url" class="form-control @error('used_tools') is-invalid @enderror" name="used_tools" value="@if ($edit) {{ old('used_tools') ?? $website->used_tools }} @else {{ old('used_tools') }} @endif" autofocus>
            @error ('used_tools')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="screenshot" class="col-md-4 col-form-label text-md-right">{{ __('Screenshot') }}</label>

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
            <button type="submit" class="btn btn-primary">@if ($edit) {{ __('Update website') }} @else {{ __('Add new website') }} @endif </button>
            <a href="{{ route('portfolio.index') }}"><button type="button" class="btn btn-light"> {{ __('Back') }} </button></a>
        </div>
    </div>
</form>
