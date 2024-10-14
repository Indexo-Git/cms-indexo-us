<div @class(['form-group row', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <textarea id="{{ $input }}" name="{{ $input }}" class="form-control form-control-modern" rows="{{ $rows ?? '6' }}" placeholder="{{ $placeholder }}" {!! $data ?? null !!} @if($required) required @endif>{{ old($input, $value) }}</textarea>
        @isset($help)
            <span class="help-block">{{ $help }} {!! $extraHelp ?? null !!}</span>
        @endisset
        @if($errors->has($input))
            <label id="{{ $input }}-error" class="error" for="{{ $input }}">{{ $errors->first($input) }}</label>
        @endif
    </div>
</div>
