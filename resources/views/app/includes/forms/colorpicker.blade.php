<div @class(['form-group row align-items-center', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <div class="input-group color" data-plugin-colorpicker>
            <span class="input-group-text input-group-addon colorpicker-input-addon"><i></i></span>
            <input id="{{ $input }}" type="text" name="{{ $input }}" class="form-control" value="{{ old($input, $value) }}" @if($required) required @endif>
        </div>
        @isset($help)
            <span class="help-block">{{ $help }} {!! $extraHelp ?? null !!}</span>
        @endisset
        @if($errors->has($input))
            <label id="{{ $input }}-error" class="error" for="{{ $input }}">{{ $errors->first($input) }}</label>
        @endif
    </div>
</div>
