@if($$model->exists && Storage::disk('public')->exists('/'.$folder.'/carousel/'.$$model->id. '-'. $number.'.jpg'))
    <a href="{{ route('delete-image-'.$model, [$$model->id, $number]) }}">
        <i class="bx bx-x-circle text-danger"></i>
    </a>
    <picture>
        <source srcset="{{ asset('storage/'.$folder.'/carousel/'.$$model->id. '-'. $number.'.webp') }}" type="image/webp">
        <img class="img-thumbnail mt-3 preview-image mb-1" src="{{ asset('storage/'.$folder.'/carousel/'.$$model->id. '-'. $number.'.jpg') }}" alt="{{ $folder }} {{ $$model->id }}">
    </picture>
@endif
<label>{{ __('forms.image') }} {{ $number }} @if(isset($required))<span class="required">*</span>@endif</label>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="input-append">
        <div class="uneditable-input position-relative">
            <i class="fas fa-file fileupload-exists"></i>
            <span class="fileupload-preview"></span>
        </div>
        <span class="btn btn-default btn-file">
             <span class="fileupload-exists">{{ __('forms.change') }}</span>
            <span class="fileupload-new">{{ __('forms.select-file') }}</span>
            <input id="image-{{ $$model->id }}-{{ $number }}" name="{{ $name }}" type="file" {{ isset($required) ? 'required' : null }}>
        </span>
        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">{{ __('forms.remove') }}</a>
    </div>
</div>
@if($errors->has($name))
    <label id="image-error" class="error" for="image-{{ $$model }}-{{ $number }}">{{ $errors->first($name) }}</label>
@endif
