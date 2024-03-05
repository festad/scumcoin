// AJAX form submission
$('#reset_form').on('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var formData = {
        // token: csrf token from main layout
        '_token': $('meta[name="csrf-token"]').attr('content'),
        'email': $('#email').val()
    };

    $.ajax({
        type: 'POST',
        url: '/reset',
        data: formData,
        dataType: 'json',
        success: function(response) {
            // Display the new password
            // alert('Your new password: ' + response.new_password); // You can change this to display in the HTML instead of an alert
            $('#resetMessage').text('Your new password: ' + response.new_password).show();
            // Optionally, clear the form or redirect the user
        },
        error: function(xhr, status, error) {
            // Handle errors
            alert('An error occurred. Please try again or contact support if the problem persists.');
        }
    });
});