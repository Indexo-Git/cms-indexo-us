<div class="form-group mb-3">
    <label for="email">{{ __('forms.your-email') }} <span class="required">*</span></label>
    <div @class(['input-group', 'has-error' => $errors->has('email')])>
        <input id="email" name="email" type="email" class="form-control form-control-lg" value="{{ old('email') }}" required {{ isset($autofocus) ? 'autofocus' : null }}>
        <span class="input-group-text">
            <i class="bx bx-user text-4 text-blue"></i>
        </span>
    </div>
    @error('email')
        <label id="email-error" class="error" for="email">{{ $message }}</label>
    @enderror
</div>
