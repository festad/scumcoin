
$('#change_button').attr("type", "button");

$('#change_button').on('click', function() {
console.log('Complete the form!');
});

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

$('button').css({
'background-color': 'rgba(0,0,0,0)',
'border-color': 'red',
'border': '3px solid',
'color': 'red'
});

$('#logo').on('mouseover', function() {
$(this).attr("src","/s_circle_red.png");
$('nav.arch').css({
'background-color': 'red',
'border-color': 'red',
'color': 'white',
});
});

$('#logo').on('mouseout', function() {
$(this).attr("src","/s_circle_blue.png");
$('nav.arch').css({
'background-color': 'rgba(0,0,0,0)',
'border-color': '#08c',
'color': '#08c'
});
});

$('.notice-labels').hide();


function pass_check(pass) {
res = [0,0,0,0,0];
if (pass.length > 7)
res[1] = 1;
if (/\d/.test(pass))
res[2] = 1;
if (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(pass))
res[3] = 1;
if (pass.length > 15)
res[4] = 1;
if (res[1] == 1 && res[2] == 1
&& res[3] == 1)
res[0] = 1;
return res;
}



function check_and_abilitate() {
if (pass_check($('#password').val())[0] == 1 &&
$('#password').val() == $('#password_confirmation').val() &&
pass_check($('#password_confirmation').val())[0] == 1
) {

console.log("Check passed!");

$('#change_button').attr("type", "submit");

$('#change_button').on('mouseover', function() {
$(this).css({
'background-color': '#08c',
'border-color': '#08c',
'color': 'white'
});
});

$('#change_button').on('mouseout', function() {
$(this).css({
'background-color': 'rgba(0,0,0,0)',
'border-color': '#08c',
'color': '#08c'
});
});
} else {
$('#change_button').attr("type", "button");

$('#change_button').on('mouseover', function() {
$(this).css({
'background-color': 'red',
'border-color': 'red',
'color': 'white'
});
});

$('#change_button').on('mouseout', function() {
$(this).css({
'background-color': 'rgba(0,0,0,0)',
'border-color': 'red',
'color': 'red'
});
});			     
}
}

$('#change_button').on('mouseover', function() {
$(this).css({
'background-color': 'red',
'border-color': 'red',
'color': 'white'
});

check_and_abilitate();
});

$('#name').on('keyup', function() {
$('.notice-labels-name').show();
res = name_check($(this).val());
if(!res) {
$('#notice-name').text("Invalid name.");
$('#notice-name').css({
color: 'red'
});
}
else {
$('#notice-name').text("Valid name!");
$('#notice-name').css({
color: '#08c'
});
}
$('#notice-name').show();

check_and_abilitate();
});

//		     $('#name').on('blur', function() {
//			 $('.notice-labels-name').hide();
//		     });


$('#password').on('keyup', function() {

$('.notice-labels-password').show();

res = pass_check($(this).val());

if (res[1] == 0) {
$('#notice-password-nchar')
.text("At least 8 characters.");
$('#notice-password-nchar')
.css({
color: 'red'
});
$('#notice-password-nchar').show();
}
else
$('#notice-password-nchar').hide();

if (res[2] == 0) {
$('#notice-password-digit').text("At least a digit.");
$('#notice-password-digit')
.css({
color: 'red'
});
$('#notice-password-digit').show();
}
else
$('#notice-password-digit').hide();

if (res[3] == 0) {
$('#notice-password-special').text(
"At least a special character:\n"+
"`!@#$%^&*()_+\-=[]{};':\"\|,.<>/?~");
$('#notice-password-special')
.css({
color: 'red'
});
$('#notice-password-special').show();
}
else
$('#notice-password-special').hide();

if (res[0] == 1) {
$('#notice-password-success').text("Medium!");
$('#notice-password-success')
.css({
color: 'orange'
});
$('#notice-password-success').show();
}
else
$('#notice-password-success').hide();

if (res[0] == 1) {
if (res[4] == 1) {
$('#notice-password-success').text("Strong!");
$('#notice-password-success')
.css({
color: '#08c'
});
}
else {
$('#notice-password-success').text("Medium");
$('#notice-password-success')
.css({
color: 'yellow'
});
}
$('#notice-password-success').show();
}
else {
$('#notice-password-success').hide();
}

check_and_abilitate();

});


//		     $('#password').on('blur', function() {
//			 $('.notice-labels-password').hide();
//		     });

$('#password_confirmation').on('keyup', function() {
$('.notice-labels-password_confirmation').show();
res = $('#password').val()
== $('#password_confirmation').val() &&
pass_check($('#password_confirmation').val())[0]
== 1;

if(!res) {
$('#notice-password_confirmation').text("Passwords are not matching.");
$('#notice-password_confirmation').css({
color: 'red'
});
}
else {
$('#notice-password_confirmation').text("Alright!");
$('#notice-password_confirmation').css({
color: '#08c'
});

$('#change_button').css({
'background-color': 'rgba(0,0,0,0)',
'border-color': '#08c',
'color': '#08c'
});
}

$('#notice-password_confirmation').show();

check_and_abilitate();

});