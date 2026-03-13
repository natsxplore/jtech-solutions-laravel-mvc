import './bootstrap';
import Swal from 'sweetalert2';

window.Swal = Swal;

/**
 * Reusable helper to display API validation / error responses using SweetAlert2.
 *
 * Expected shape:
 * {
 *   message: "Email address is required. (and 1 more error)",
 *   errors: {
 *     email: ["Email address is required."],
 *     password: ["Password is required."]
 *   }
 * }
 */
window.handleApiError = function handleApiError(xhr) {
    const json = xhr?.responseJSON || {};
    const message = json.message || 'Something went wrong. Please try again.';
    const errors = json.errors || {};

    // Flatten validation errors into a list
    const allMessages = [];
    Object.keys(errors).forEach((field) => {
        const fieldMessages = errors[field] || [];
        fieldMessages.forEach((m) => allMessages.push(m));
    });

    if (allMessages.length > 0) {
        const list = allMessages
            .map((m) => '<li>' + m + '</li>')
            .join('');

        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            html: '<ul>' + list + '</ul>',
            confirmButtonColor: '#ef4444',
        });
        return;
    }

    Swal.fire({
        icon: 'error',
        title: 'Oops! Something went wrong.',
        text: message,
        confirmButtonColor: '#ef4444',
    });
};
