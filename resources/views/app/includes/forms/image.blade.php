<div @class(['form-group row align-items-center', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="input-append">
                <div class="uneditable-input position-relative">
                    <i class="fas fa-file fileupload-exists"></i>
                    <span class="fileupload-preview"></span>
                </div>
                <span class="btn btn-default btn-file">
                    <span class="fileupload-exists">{{ __('forms.change') }}</span>
                    <span class="fileupload-new">{{ __('forms.select-file') }}</span>
                    <input id="{{ $input }}" name="{{ $input }}" type="file">
                </span>
                <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">{{ __('forms.remove') }}</a>
            </div>
        </div>
        @if($previewFile &&  Storage::disk('public')->exists($previewPath.'.jpg'))
            <picture>
                <source srcset="{{ asset('storage/'.$previewPath.'.webp') }}" type="image/webp">
                <img class="img-thumbnail mt-3 preview-image" src="{{ asset('storage/'.$previewPath.'.jpg') }}" alt="preview">
            </picture>
            @if($showDelete)
                <a href="{{ $deleteRoute }}">
                    <i class="fas fa-times text-danger"></i>
                </a>
            @endif
        @endif
        @isset($help)
            <span class="help-block text-warning mb-0">{{ $help }}</span>
        @endisset
        @if($errors->has($input))
            <label id="{{ $input }}-error" class="error" for="{{ $input }}">{{ $errors->first($input) }}</label>
        @endif
    </div>
</div>
