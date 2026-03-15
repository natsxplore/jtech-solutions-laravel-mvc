$(document).ready(function() {
    // Store the base HTML template (without the message)
    const blockTemplate = `
        <div class="flex flex-col items-center gap-3 p-6 bg-white rounded-lg shadow-xl">
            <svg class="animate-spin h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-gray-700 font-medium MESSAGE_PLACEHOLDER">Please wait...</span>
        </div>
    `;

    // Set default message (will be overridden by our custom function)
    $.blockUI.defaults.message = blockTemplate.replace('MESSAGE_PLACEHOLDER', 'id="blockUIMessage"');

    $.blockUI.defaults.css = {
        border: 'none',
        padding: '0',
        backgroundColor: 'transparent',
        width: 'auto'
    };

    $.blockUI.defaults.overlayCSS = {
        backgroundColor: '#000',
        opacity: 0.3
    };

    // CSRF Token setup
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

    $.ajaxSetup({
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            ...(csrfToken && { 'X-CSRF-TOKEN': csrfToken }),
        },
        beforeSend: function (_jqXHR, settings) {
            if (settings.blockUI !== false) {
                // Use our custom blockUI function
                if (settings.blockMessage) {
                    window.blockUI(settings.blockMessage);
                } else {
                    window.blockUI('Please wait...');
                }
            }
        },
        complete: function () {
            $.unblockUI();
        },
    });

    window.blockUI = (message = 'Please wait...') => {
        const customMessage = `
            <div class="flex flex-col items-center gap-3 p-6 bg-white rounded-lg shadow-xl">
                <svg class="animate-spin h-10 w-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="text-gray-700 font-medium">${message}</span>
            </div>
        `;

        $.blockUI({
            message: customMessage,
            css: {
                border: 'none',
                padding: '0',
                backgroundColor: 'transparent',
                width: 'auto',
                top: '50%',
                left: '50%',
                transform: 'translate(-50%, -50%)'
            },
            overlayCSS: {
                backgroundColor: '#000',
                opacity: 0.3
            }
        });
    };

    window.unblockUI = () => $.unblockUI();
});
