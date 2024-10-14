<div @class(['form-group row align-items-center', 'pb-3' => $paddingBottom])>
<label for="{{ $input }}" @class(['col-lg-5 col-xl-3 control-label text-lg-end mb-0', 'text-danger' => isset($danger) && $danger == 'true'])>{{ $label }}</label>
    <div class="col-lg-7 col-xl-6">
        <div @class(['checkbox-custom', 'checkbox-danger' => isset($danger) && $danger == 'true'])>
            <input id="{{ $input }}" name="{{ $input }}" type="checkbox" {{ $checked ? 'checked' : '' }}>
            <label for="{{ $input }}" @class(['text-danger' => isset($danger) && $danger == 'true'])>{{ $labelTwo }}</label>
        </div>
    </div>
</div>
