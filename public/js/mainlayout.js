
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
});

$('#logo').on('mouseout', function() {
    $(this).attr("src", "/s_circle_blue.png");
    $('.arch').css({
        'background-color': 'rgba(0,0,0,0)',
        'border-color': '#08c',
        'color': '#08c'
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