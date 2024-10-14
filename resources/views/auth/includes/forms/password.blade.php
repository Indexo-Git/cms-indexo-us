<div class="form-group mb-3">
    <div class="clearfix">
        <label for="password" class="float-left">{{ __('forms.your-password') }} <span class="required">*</span></label>
        <a tabindex="-1" href="{{ route('password.request') }}" class="float-end">{{ __('auth.Forgot your password') }}</a>
    </div>
    <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" name="password" type="password" class="form-control form-control-lg">
        <span class="input-group-text">
            <i class="bx bx-lock text-blue text-4"></i>
        </span>
    </div>
    @error('password'))
        <label id="password-error" class="error" for="password">{{ $message }}</label>
    @enderror
</div>
