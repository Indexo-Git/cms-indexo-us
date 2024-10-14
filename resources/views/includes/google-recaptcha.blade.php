<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ env('GOOGLE_RECAPTCHA_PUBLIC') }}', {action: '{{ $form }}'}).then(function(token) {
            var input = document.createElement("input");
            input.type = "hidden";
            input.name = "g-token";
            input.value = token;
            signUpForm = document.getElementById('{{ $form }}');
            if(signUpForm){
                signUpForm.appendChild(input);
            }
        });
    });
</script>
