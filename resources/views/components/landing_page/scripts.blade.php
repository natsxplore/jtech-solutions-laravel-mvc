<script>
(function () {
    function toggleBilling() {
        var toggle = document.getElementById('billing-toggle');
        var pill = document.getElementById('billing-pill');
        if (!toggle || !pill) return;
        var isYearly = toggle.getAttribute('aria-pressed') === 'true';
        var nowYearly = !isYearly;
        toggle.setAttribute('aria-pressed', nowYearly);
        if (nowYearly) {
            pill.classList.add('translate-x-7');
            toggle.classList.add('bg-indigo-600');
        } else {
            pill.classList.remove('translate-x-7');
            toggle.classList.remove('bg-indigo-600');
        }
        document.querySelectorAll('[data-monthly]').forEach(function (el) {
            el.textContent = nowYearly ? el.dataset.yearly : el.dataset.monthly;
        });
    }
    var billingBtn = document.getElementById('billing-toggle');
    if (billingBtn) billingBtn.addEventListener('click', toggleBilling);

    document.querySelectorAll('.faq-item').forEach(function (item) {
        var trigger = item.querySelector('.faq-trigger');
        var answer = item.querySelector('.faq-answer');
        var chevron = item.querySelector('.faq-chevron');
        if (!trigger || !answer) return;
        trigger.addEventListener('click', function () {
            var isOpen = answer.classList.contains('grid-rows-[1fr]');
            document.querySelectorAll('.faq-item').forEach(function (other) {
                var oAnswer = other.querySelector('.faq-answer');
                var oChevron = other.querySelector('.faq-chevron');
                var oTrigger = other.querySelector('.faq-trigger');
                if (oAnswer) oAnswer.classList.remove('grid-rows-[1fr]');
                if (oChevron) oChevron.classList.remove('rotate-180');
                if (oTrigger) oTrigger.setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                answer.classList.add('grid-rows-[1fr]');
                if (chevron) chevron.classList.add('rotate-180');
                trigger.setAttribute('aria-expanded', 'true');
            }
        });
    });
})();
</script>
