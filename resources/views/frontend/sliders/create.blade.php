@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.sliders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="hero_title">{{ trans('cruds.slider.fields.hero_title') }}</label>
                            <input class="form-control" type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', '') }}">
                            @if($errors->has('hero_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hero_title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.hero_title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="hero_subtitle">{{ trans('cruds.slider.fields.hero_subtitle') }}</label>
                            <input class="form-control" type="text" name="hero_subtitle" id="hero_subtitle" value="{{ old('hero_subtitle', '') }}">
                            @if($errors->has('hero_subtitle'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('hero_subtitle') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.hero_subtitle_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="button_text">{{ trans('cruds.slider.fields.button_text') }}</label>
                            <input class="form-control" type="text" name="button_text" id="button_text" value="{{ old('button_text', '') }}">
                            @if($errors->has('button_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('button_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.button_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="button_url">{{ trans('cruds.slider.fields.button_url') }}</label>
                            <input class="form-control" type="text" name="button_url" id="button_url" value="{{ old('button_url', '') }}">
                            @if($errors->has('button_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('button_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.button_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="image">{{ trans('cruds.slider.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="button_2_text">{{ trans('cruds.slider.fields.button_2_text') }}</label>
                            <input class="form-control" type="text" name="button_2_text" id="button_2_text" value="{{ old('button_2_text', '') }}">
                            @if($errors->has('button_2_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('button_2_text') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.button_2_text_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="button_2_url">{{ trans('cruds.slider.fields.button_2_url') }}</label>
                            <input class="form-control" type="text" name="button_2_url" id="button_2_url" value="{{ old('button_2_url', '') }}">
                            @if($errors->has('button_2_url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('button_2_url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.button_2_url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="language_id">{{ trans('cruds.slider.fields.language') }}</label>
                            <select class="form-control select2" name="language_id" id="language_id" required>
                                @foreach($languages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('language_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.language_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('frontend.sliders.storeMedia') }}',
    maxFilesize: 4, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($slider) && $slider->image)
      var files = {!! json_encode($slider->image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection