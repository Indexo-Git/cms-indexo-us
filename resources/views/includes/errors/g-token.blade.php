@error('g-token')
<div class="alert alert-warning py-2">
    <h5><i class="fa fa-warning fa-sm"></i> {{ __('auth.attention') }}</h5>
    <p class="mb-0">{{ $message }}</p>
</div>
@enderror
