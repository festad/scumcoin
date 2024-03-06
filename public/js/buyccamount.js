$('#buy_button').attr("type", "button");

$('#buy_button').css({
	'background-color': 'rgba(0,0,0,0)',
	'border-color': 'red',
	'border': '3px solid',
	'color': 'red',
});

$('#buy_button').on('click', function() {
	console.log('Complete the form!');
});

function amount_check(amount) {
	return /^[0-9]+\.[0-9][0-9]$/.test(amount);
}

function check_and_abilitate() {
	if (amount_check($('#amount').val())) {
        $('#buy_button').attr("type","submit");
        $('#buy_button').on('mouseover', function() {
            $(this).css({
            'background-color': '#08c',
            'border-color': '#08c',
            'color': 'white'
            });
        });

        $('#buy_button').on('mouseout', function() {
            $(this).css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': '#08c',
            'color': '#08c'
            });
        });

	} else {

        $('#buy_button').attr("type", "button");
        
        $('#buy_button').on('mouseover', function() {
            $(this).css({
            'background-color': 'red',
            'border-color': 'red',
            'color': 'white'
            });
        });

        $('#buy_button').on('mouseout', function() {
            $(this).css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': 'red',
            'color': 'red'
            });
        });
	}
}

$('#buy_button').on('mouseover', function() {
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
        $('#buy_button').css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': 'red',
            'color': 'red'
        });
	} else {
        $('#notice_amount').text("Alright!");
        $('#notice_amount').css({color: '#08c'});
        $('#buy_button').css({
            'background-color': 'rgba(0,0,0,0)',
            'border-color': '#08c',
            'color': '#08c'
        });
	}

	check_and_abilitate();
})


$('body').css({
	'padding-top': '100px'
});

$('nav').css({
	'border-bottom': '5px',
	'border-bottom-width': '5px',
	'border-bottom-style': 'solid',
	'border-bottom-color': '#08c',
	'background-color': '#333333'
});

$('#login_button').css({
	'margin-right': '10px'
});

$('#logo').on('mouseover', function() {
	$(this).attr("src","/s_circle_red.png");
	$('.arch').css({
	'background-color': 'red',
	'border-color': 'red',
	'color': 'white',
	});
});

$('#logo').on('mouseout', function() {
	$(this).attr("src","/s_circle_blue.png");
	$('.arch').css({
	'background-color': 'rgba(0,0,0,0)',
	'border-color': '#08c',
	'color': '#08c'
	});
});
