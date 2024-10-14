<div @class(['form-group row align-items-center', 'has-error' => $errors->has($input), 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <select id="{{ $input }}" name="{{ $input }}" class="form-control form-control-modern">
            @foreach($options as $value => $option)
                <option value="{{ $value }}" {{ isset($conditionSelected) && $conditionSelected == $value ? 'selected' : '' }}>{{ $option }}</option>
            @endforeach
        </select>
        @if($errors->has($input))
            <label id="{{ $input }}-error" class="error" for="{{ $input }}">{{ $errors->first($input) }}</label>
        @endif
    </div>
</div>
