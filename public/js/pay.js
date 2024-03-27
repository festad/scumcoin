// $('#pay_button').attr("type", "button");

$('#pay_button').css({
    'background-color': 'rgba(0,0,0,0)',
    'border-color': 'red',
    'border': '3px solid',
    'color': 'red',
});

// $('#pay_button').on('click', function() {
//     console.log('Complete the form!');
// });

function amount_check(amount) {
    return /^[0-9]+\.[0-9][0-9]$/.test(amount);
}

function isValidReceiver(pubkey) {
    var isValid = false;
    $('#pubkeys option').each(function() {
        if (this.value === pubkey) {
            isValid = true;
            return false; // break out of the .each() loop
        }
    });
    return isValid;
}

function check_and_abilitate() {
    var pubkey = $('#pubkey_receiver').val();
    if (amount_check($('#amount').val()) && isValidReceiver(pubkey)) {
        // $('#pay_button').attr("type", "submit");
        $('#pay_button').prop('disabled', false);
        $('#pay_button').on('mouseover', function() {
            $(this).css({
                'background-color': '#08c',
                'border-color': '#08c',
                'color': 'white'
            });
        });

        $('#pay_button').on('mouseout', function() {
            $(this).css({
                'background-color': 'rgba(0,0,0,0)',
                'border-color': '#08c',
                'color': '#08c'
            });
        });
    } else {
        // $('#pay_button').attr("type", "button");
        $('#pay_button').prop('disabled', true);
        $('#pay_button').on('mouseover', function() {
            $(this).css({
                'background-color': 'red',
                'border-color': 'red',
                'color': 'white'
            });
        });

        $('#pay_button').on('mouseout', function() {
            $(this).css({
                'background-color': 'rgba(0,0,0,0)',
                'border-color': 'red',
                'color': 'red'
            });
        });
    }
}

$('#pubkey_receiver').on('input', function() {
    check_and_abilitate();
});

$(document).ready(function() {
    check_and_abilitate();
});

$('#pay_button').on('mouseover', function() {
    $(this).css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white'
    });
    check_and_abilitate();
});

$('#amount').on('keyup', function() {
    res = amount_check($(this).val());
    if (!res) {
        $('#notice_amount').text("Invalid amount.");
        $('#notice_amount').css({color: 'red'});
        $('#pay_button').css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': 'red',
            'color': 'red'
        });
    } else {
        $('#notice_amount').text("Alright!");
        $('#notice_amount').css({color: '#08c'});
        $('#pay_button').css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': '#08c',
            'color': '#08c'
        });
    }

    check_and_abilitate();
});