<div @class(['checkbox-custom', 'checkbox-danger' => isset($danger) && $danger == 'true'])>
    <input id="{{ $input }}" name="{{ $name ?? $input }}" value="{{ $value ?? 'on' }}" type="checkbox" {{ $checked ? 'checked' : '' }}>
    <label for="{{ $input }}" @class(['text-danger' => isset($danger) && $danger == 'true'])>{{ $labelTwo }}</label>
</div>
