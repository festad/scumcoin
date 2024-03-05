$('body').css({
    'padding-top': '100px'
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

$('#login_button').css({
    'margin-right': '10px'
});

$('#logo').on('mouseover', function() {
    $(this).attr("src", "/s_circle_red.png");
    $('.arch').css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white'
    });
    $('#delete_button').css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white'
    });
    $('#pay_user_button').css({
        'background-color': 'green',
        'border-color': 'green',
        'color': 'white'
    });
});

$('#logo').on('mouseout', function() {
    $(this).attr("src", "/s_circle_blue.png");
    $('.arch').css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': '#08c',
        'color': '#08c'
    });
    $('#delete_button').css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': 'red',
        'color': 'red'
    });
    $('#pay_user_button').css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': 'green',
        'color': 'green'
    });
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

$('#pay_user_button').on('mouseover', function() {
    $(this).css({
        'background-color': 'green',
        'border-color': 'green',
        'color': 'white'
    });
});

$('#pay_user_button').on('mouseout', function() {
    $(this).css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': 'green',
        'color': 'green'
    });
});

$('#delete_button').on('mouseover', function() {
    color = $(this).css('border-color');
    $(this).css({
        'background-color': 'red',
        'border-color': 'red',
        'color': 'white'
    });
});

$('#delete_button').on('mouseout', function() {
    color = $(this).css('border-color');
    $(this).css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': 'red',
        'color': 'red'
    });
});