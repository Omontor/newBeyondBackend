@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.contactText.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contact-texts.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="contact_title">{{ trans('cruds.contactText.fields.contact_title') }}</label>
                            <input class="form-control" type="text" name="contact_title" id="contact_title" value="{{ old('contact_title', '') }}">
                            @if($errors->has('contact_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactText.fields.contact_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="contact_subtitle">{{ trans('cruds.contactText.fields.contact_subtitle') }}</label>
                            <input class="form-control" type="text" name="contact_subtitle" id="contact_subtitle" value="{{ old('contact_subtitle', '') }}">
                            @if($errors->has('contact_subtitle'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact_subtitle') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactText.fields.contact_subtitle_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="language_id">{{ trans('cruds.contactText.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id">
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('language_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactText.fields.language_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection