<div @class(['form-group mb-0', 'has-error' => $errors->has('password')])>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="password">{{ __('forms.your-password') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-text cur-pointer show-password">
                    <i id="eye-password" class="fas fa-eye text-muted"></i>
                </div>
                <input id="password" type="password" class="form-control form-control-lg input-password" name="password" placeholder="*********" required minlength="8">
            </div>
            @error('password')
                <label id="password-error" class="error" for="password">{{ $message }}</label>
            @enderror
        </div>
        <div class="col-sm-6 mb-3">
            <label for="password-confirm">{{ __('forms.password-confirm') }}</label>
            <input id="password-confirm" type="password" class="form-control form-control-lg input-password" name="password_confirmation" placeholder="*********" required minlength="8">
        </div>
    </div>
</div>
