<div @class(['form-group row align-items-center', 'pb-3' => $paddingBottom])>
    <label for="{{ $input }}" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $label }} @if($required)<span class="required">*</span>@endif</label>
    <div class="col-lg-7 col-xl-6">
        <input id="{{ $input }}" name="{{ $input }}" type="password" class="form-control form-control-modern" placeholder="{{ $placeholder }}" @if($required) required @endif {!! $data ?? null !!}>
    </div>
</div>
