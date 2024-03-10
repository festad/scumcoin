$('#register_button').attr("type", "button");

$('#register_button').on('click', function() {
    console.log('Complete the form!');
});

$('body').css({
    'padding-top': '100px',
    'padding-bottom': '100px'
});

$('nav').css({
    'border-bottom': '5px solid #08c',
    'background-color': '#333333'
});

$('button').css({
    'background-color': 'rgba(0,0,0,0)',
    'border': '3px solid #08c',
    'color': '#08c'
});

$('#register_button').css({
    'background-color': 'rgba(0,0,0,0)',
    'border': '3px solid red',
    'color': 'red'
});

$('button').on('mouseover', function() {
    $(this).css({
        'background-color': '#08c',
        'border-color': '#08c',
        'color': 'white'
    });
});

$('button').on('mouseout', function() {
    $(this).css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': '#08c',
        'color': '#08c'
    });
});


$('#register_button').on('mouseover', function() {
    // if check_and_abilitate() returns true
    // the color is green, otherwise it's red.
    if (check_and_abilitate()) {
        $(this).css({
            'background-color': '#08c',
            'border-color': '#08c',
            'color': 'white'
        });
    } else {
        $(this).css({
            'background-color': 'red',
            'border-color': 'red',
            'color': 'white'
        });
    }
});

$('#register_button').on('mouseout', function() {
    if(check_and_abilitate()) {
        $(this).css({
            'background-color': '#08c',
            'border-color': '#08c',
            'color': 'white'
        });
    } else {
        $(this).css({
            'background-color': 'red',
            'border-color': 'red',
            'color': 'white'
        });
    }
});

$('#logo').on('mouseover', function() {
    $(this).attr("src", "/s_circle_red.png");
    $('nav.arch').css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white',
    });
});

$('#logo').on('mouseout', function() {
    $(this).attr("src", "/s_circle_blue.png");
    $('nav.arch').css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': '#08c',
        'color': '#08c'
    });
});

$('.notice-labels').hide();

function name_check(name) {
    return /^[A-Z][a-z]*(( ([A-Z]|[a-z])[a-z]*)* [A-Z][a-z]*|)$/.test(name);
}

function email_check(email) {
    return /^[a-z0-9\.]+@[a-z0-9\.]*[a-z0-9]+\.(jp|com|it|pl|org|us)$/.test(email);
}

function pass_check(pass) {
    res = [0, 0, 0, 0, 0];
    if (pass.length > 7)
        res[1] = 1;
    if (/\d/.test(pass))
        res[2] = 1;
    if (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pass))
        res[3] = 1;
    if (pass.length > 15)
        res[4] = 1;
    if (res[1] == 1 && res[2] == 1 && res[3] == 1)
        res[0] = 1;
    return res;
}

function check_and_abilitate() {
    var isValidName = name_check($('#name').val());
    var isValidEmail = email_check($('#email').val()) && $('#notice-email-existence').text() == "available";
    var passwordChecks = pass_check($('#password').val());
    var isValidPassword = passwordChecks[0] == 1;
    var arePasswordsMatching = $('#password').val() == $('#password_confirmation').val();
    var isConfirmationPasswordValid = pass_check($('#password_confirmation').val())[0] == 1;

    var isValid = isValidName && isValidEmail && isValidPassword && arePasswordsMatching && isConfirmationPasswordValid;

    $('#register_button').prop('disabled', !isValid);

    if (isValid) {
        console.log("Check passed!");
        setButtonStyle('#08c', '#08c', 'white'); // Valid state colors
        return true;
    } else {
        $('#register_button').prop('disabled', true);
        console.log("Check not passed!");
        setButtonStyle('red', 'red', 'white'); // Invalid state colors
        return false;
    }
}

function setButtonStyle(backgroundColor, borderColor, textColor) {
    $('#register_button').css({
        'background-color': backgroundColor,
        'border-color': borderColor,
        'color': textColor
    }).hover(
        function() { // Mouseover
            $(this).css({
                'background-color': borderColor,
                'color': 'white'
            });
        },
        function() { // Mouseout
            $(this).css({
                'background-color': backgroundColor,
                'color': textColor
            });
        }
    );
}


// on everything with tag "input", on "input" event, call "check_and_abilitate"
$('input').on('input', function() {
    check_and_abilitate();
});

$('#register_button').on('mouseover', function() {
    $(this).css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white'
    });
    check_and_abilitate();
});

$('#name').on('input', function() {
    $('.notice-labels-name').show();
    res = name_check($(this).val());
    if (!res) {
        $('#notice-name').text("Invalid name.");
        $('#notice-name').css({
            color: 'red'
        });
    } else {
        $('#notice-name').text("Valid name!");
        $('#notice-name').css({
            color: '#08c'
        });
    }
    $('#notice-name').show();
    check_and_abilitate();
});

$('#email').on('input', function() {
    $('.notice-labels-email').show();
    res = email_check($(this).val());
    if (!res) {
        $('#notice-email').text("Invalid email.");
        $('#notice-email').css({
            color: 'red'
        });
    } else {
        $('#notice-email').text("Valid email.");
        $('#notice-email').css({
            color: '#08c'
        });
    }
    $('#notice-email').show();
    check_and_abilitate();
});

// ajax check on email existence
$('#email').on('input', function() {
    // if the check on email passes, then proceed 
    // to check if the email is already in use.
    if (!email_check($(this).val())) {
        $('#notice-email').text("Invalid email.");
        $('#notice-email').css({
            color: 'red'
        });
        $('#notice-email').show();
        check_and_abilitate();
        return;
    }

    $.ajax({
        url: '/check_email',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            email: $('#email').val(),
        },
        success: function(response) {
            if (response.exists == 'not_available') {
                $('#notice-email').text("Email already in use.");
                $('#notice-email').css({
                    color: 'red'
                });
                $('#notice-email-existence').text("not_available");
            } else if (response.exists == 'available') {
                $('#notice-email').text("Email available.");
                $('#notice-email').css({
                    color: '#08c'
                });
                $('#notice-email-existence').text("available");
            }
            $('#notice-email').show();
            check_and_abilitate();
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});

$('#password').on('keyup', function() {
    $('.notice-labels-password').show();
    res = pass_check($(this).val());
    if (res[1] == 0) {
        $('#notice-password-nchar').text("At least 8 characters.");
        $('#notice-password-nchar').css({
            color: 'red'
        });
        $('#notice-password-nchar').show();
    } else {
        $('#notice-password-nchar').hide();
    }
    if (res[2] == 0) {
        $('#notice-password-digit').text("At least a digit.");
        $('#notice-password-digit').css({
            color: 'red'
        });
        $('#notice-password-digit').show();
    } else {
        $('#notice-password-digit').hide();
    }
    if (res[3] == 0) {
        $('#notice-password-special').text("At least a special character: `!@#$%^&*()_+\-=[]{};':\"\|,.<>/?~");
        $('#notice-password-special').css({
            color: 'red'
        });
        $('#notice-password-special').show();
    } else {
        $('#notice-password-special').hide();
    }
    if (res[0] == 1) {
        $('#notice-password-success').text("Medium!");
        $('#notice-password-success').css({
            color: 'orange'
        });
        $('#notice-password-success').show();
    } else {
        $('#notice-password-success').hide();
    }
    if (res[0] == 1) {
        if (res[4] == 1) {
            $('#notice-password-success').text("Strong!");
            $('#notice-password-success').css({
                color: '#08c'
            });
        } else {
            $('#notice-password-success').text("Medium");
            $('#notice-password-success').css({
                color: 'yellow'
            });
        }
        $('#notice-password-success').show();
    } else {
        $('#notice-password-success').hide();
    }
    check_and_abilitate();
});

$('#password_confirmation').on('keyup', function() {
    $('.notice-labels-password_confirmation').show();
    res = $('#password').val() == $('#password_confirmation').val() &&
        pass_check($('#password_confirmation').val())[0] == 1;
    if (!res) {
        $('#notice-password_confirmation').text("Passwords are not matching.");
        $('#notice-password_confirmation').css({
            color: 'red'
        });
    } else {
        $('#notice-password_confirmation').text("Alright!");
        $('#notice-password_confirmation').css({
            color: '#08c'
        });
    }
    $('#notice-password_confirmation').show();
    check_and_abilitate();
});