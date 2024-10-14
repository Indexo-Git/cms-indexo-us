<div @class(['form-group row align-items-center', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }}</label>
    <div class="col-lg-7 col-xl-6">
        <div class="switch switch-sm switch-primary">
            <input id="{{ $input }}" name="{{ $input }}" type="checkbox" data-plugin-ios-switch @if($checked) checked="checked" @endif>
        </div>
    </div>
</div>
