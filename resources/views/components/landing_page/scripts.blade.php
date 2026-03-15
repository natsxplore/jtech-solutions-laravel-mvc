@push('scripts')
    @vite(['resources/js/pages/register.js'])
    <script>
    $(function () {
        // Auth modal switch (Login <-> Register) — clear form fields when switching
        $(document).on('click', '.auth-modal-switch', function (e) {
            e.preventDefault();
            var closeId = $(this).data('close');
            var openId = $(this).data('open');
            if (closeId) {
                $('#' + closeId).prop('checked', false);
            }
            if (openId) {
                $('#' + openId).prop('checked', true);
            }
            if (openId === 'modal-login') {
                var $loginForm = $('#loginForm');
                if ($loginForm.length && $loginForm[0]) {
                    $loginForm[0].reset();
                    $loginForm.find('.error-text').text('');
                }
            }
            if (openId === 'modal-register') {
                var $regForm = $('#registerForm');
                if ($regForm.length && $regForm[0]) {
                    $regForm[0].reset();
                    $regForm.find('.error-text').text('');
                }
                $(window).trigger('register-wizard-reset');
            }
        });

        // Registration wizard (steps indicator is outside the form, so we query from form's parent)
        var $form = $('#registerForm');
        if ($form.length) {
            var $container = $form.parent();
            var totalSteps = 3;
            var currentStep = 1;

            function goToStep(step) {
                currentStep = Math.max(1, Math.min(totalSteps, step));

                $form.find('.register-wizard-pane').each(function () {
                    var n = parseInt($(this).data('pane'), 10);
                    $(this).toggleClass('hidden', n !== currentStep);
                });

                if ($container.length) {
                    $container.find('.register-wizard-dot').each(function () {
                        var n = parseInt($(this).data('step'), 10);
                        var active = n <= currentStep;
                        $(this)
                            .toggleClass('bg-indigo-600', active)
                            .toggleClass('text-white', active)
                            .toggleClass('bg-gray-200', !active)
                            .toggleClass('text-gray-500', !active)
                            .attr('aria-current', n === currentStep ? 'step' : null);
                    });
                    $container.find('.register-wizard-line').each(function () {
                        var n = parseInt($(this).data('line'), 10);
                        $(this)
                            .toggleClass('bg-indigo-600', n < currentStep)
                            .toggleClass('bg-gray-200', n >= currentStep);
                    });
                    $container.find('.register-wizard-steps [data-step]').each(function () {
                        var $dot = $(this);
                        var $parent = $dot.closest('.flex.items-center');
                        var $span = $parent.find('span');
                        if ($span.length) {
                            var stepNum = parseInt($dot.data('step'), 10);
                            $span.toggleClass('text-gray-700', stepNum <= currentStep);
                            $span.toggleClass('text-gray-500', stepNum > currentStep);
                        }
                    });
                }

                $form.find('.register-wizard-prev').toggleClass('hidden', currentStep === 1);
                $form.find('.register-wizard-next').toggleClass('hidden', currentStep === totalSteps);
                $form.find('.register-wizard-submit').toggleClass('hidden', currentStep !== totalSteps);
            }

            $form.find('.register-wizard-next').on('click', function () {
                goToStep(currentStep + 1);
            });
            $form.find('.register-wizard-prev').on('click', function () {
                goToStep(currentStep - 1);
            });

            $(window).on('register-wizard-reset', function () {
                goToStep(1);
            });

            $('#modal-register').on('change', function () {
                if ($(this).prop('checked')) {
                    $form[0] && $form[0].reset();
                    $form.find('.error-text').text('');
                    goToStep(1);
                }
            });

            goToStep(1);
        }

        // Clear login form when login modal is opened (e.g. from navbar or "Sign in" link)
        $('#modal-login').on('change', function () {
            if ($(this).prop('checked')) {
                var $loginForm = $('#loginForm');
                if ($loginForm.length && $loginForm[0]) {
                    $loginForm[0].reset();
                    $loginForm.find('.error-text').text('');
                }
            }
        });

        // Billing toggle: monthly ↔ yearly
        $('#billing-toggle').on('click', function () {
            var $toggle = $(this);
            var $pill = $('#billing-pill');
            var nowYearly = $toggle.attr('aria-pressed') !== 'true';

            $toggle.attr('aria-pressed', nowYearly);
            $pill.toggleClass('translate-x-7', nowYearly);
            $toggle.toggleClass('billing-toggle-active', nowYearly);

            $('[data-monthly]').each(function () {
                $(this).text(nowYearly ? $(this).data('yearly') : $(this).data('monthly'));
            });
        });
    });
    </script>
@endpush
