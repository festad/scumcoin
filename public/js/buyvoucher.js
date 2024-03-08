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

function code_check(code) {
	return /^[a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]$/.test(code);
}

function check_and_abilitate() {
	if (code_check($('#code').val())) {
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

$('#code').on('keyup', function() {
	res = code_check($(this).val());
	if (!res) {
	$('#notice_code').text("Invalid code.");
	$('#notice_code').css({color: 'red'});
	$('#buy_button').css({
		'background-color': 'rgba(0,0,0,0)',
		'border-color': 'red',
		'color': 'red'
	});
	} else {
	$('#notice_code').text("Alright!");
	$('#notice_code').css({color: '#08c'});
	$('#buy_button').css({
		'background-color': 'rgba(0,0,0,0)',
		'border-color': '#08c',
		'color': '#08c'
	});
	}

	check_and_abilitate();
})
