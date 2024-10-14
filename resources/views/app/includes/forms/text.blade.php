<div @class(['form-group row align-items-center', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <input id="{{ $input }}" name="{{ $input }}" type="text" class="form-control form-control-modern" value="{{ old($input, $value) }}" placeholder="{{ $placeholder }}" @if($required) required @endif {!! $data ?? null !!}>
        @isset($help)
            <span class="help-block @isset($helpClass) {{ $helpClass }} @endisset">{{ $help }} {!! $extraHelp ?? null !!}</span>
        @endisset
        @if($errors->has($input))
            <label id="{{ $input }}-error" class="error" for="{{ $input }}">{{ $errors->first($input) }}</label>
        @endif
    </div>
</div>
