{{--
    <x-password-eye-script />
--}}

<script>
    var passwordToggleScriptLoaded = false;

    $(document).ready(function() {
        if (!passwordToggleScriptLoaded) {
            $('.pw-eye').click(function() {
                const toggleElement = $(this);
                const inputId = toggleElement.attr('pw-eye-for');
                const input = $('#' + inputId);

                const type = input.attr('type') === 'password' ? 'text' : 'password';
                input.attr('type', type);

                const icon = toggleElement.find('i.bi');
                if (type === 'text') {
                    icon.removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
                } else {
                    icon.removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
                }

            });

            passwordToggleScriptLoaded = true;
        }
    });
</script>
