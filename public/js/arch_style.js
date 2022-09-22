function blue2red(x) {
    x.src = "/s_circle_red.png"
    document.getElementById("scumcoin_navbar")
        .style
        .borderBottomColor = "red"
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.setProperty("background-color", "red");
    });
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.setProperty("border-color", "red");
    });
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.setProperty("color", "white");
    });
    
    document.getElementById("navbar_toggler")
        .style
        .setProperty("background-color", "red")     
}

function red2blue(x) {
    x.src = "/s_circle_blue.png"
    document.getElementById("scumcoin_navbar")
        .style
        .borderBottomColor = "#08c"
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.backgroundColor = "#333333";
    });
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.setProperty("border-color", "#08c");
    });
    
    Array.from(document.getElementsByClassName("btn")).forEach(btn => {
	btn.style.setProperty("color", "#08c");
    });
    
    document.getElementById("navbar_toggler")
        .style
        .setProperty("background-color", "#08c")
}

// REGISTER BUTTON 

function trans2bluelog() {
    document.getElementById("login_button")
        .style
        .setProperty("color", "white")
    document.getElementById("login_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("login_button")
        .style
	.setProperty("border-color", "#08c");
}

function blue2translog() {
    document.getElementById("login_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("login_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("login_button")
        .style
	.setProperty("border-color", "#08c");
}

function trans2bluereg() {
    document.getElementById("register_button")
        .style
        .setProperty("color", "white")
    document.getElementById("register_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("register_button")
        .style
	.setProperty("border-color", "#08c");
}

function blue2transreg() {
    document.getElementById("register_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("register_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("register_button")
        .style
	.setProperty("border-color", "#08c");
}

function trans2bluepaybut() {
    document.getElementById("pay_button")
        .style
        .setProperty("color", "white")
    document.getElementById("pay_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("pay_button")
        .style
	.setProperty("border-color", "#08c");
}

function blue2transpaybut() {
    document.getElementById("pay_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("pay_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("pay_button")
        .style
	.setProperty("border-color", "#08c");
}

function trans2bluedel() {
    document.getElementById("delete_button")
        .style
        .setProperty("color", "white")
    document.getElementById("delete_button")
        .style
        .setProperty("background-color", "red")
    document.getElementById("delete_button")
        .style
	.setProperty("border-color", "red");
}

function blue2transdel() {
    document.getElementById("delete_button")
        .style
        .setProperty("color", "red")
    document.getElementById("delete_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("delete_button")
        .style
	.setProperty("border-color", "red");
}

function trans2bluepay() {
    document.getElementById("pay_user_button")
        .style
        .setProperty("color", "white")
    document.getElementById("pay_user_button")
        .style
        .setProperty("background-color", "green")
    document.getElementById("pay_user_button")
        .style
	.setProperty("border-color", "green");
}

function blue2transpay() {
    document.getElementById("pay_user_button")
        .style
        .setProperty("color", "green")
    document.getElementById("pay_user_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("pay_user_button")
        .style
	.setProperty("border-color", "green");
}

function trans2bluebh() {
    document.getElementById("back_home_button")
        .style
        .setProperty("color", "white")
    document.getElementById("back_home_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("back_home_button")
        .style
	.setProperty("border-color", "#08c");    
}

function blue2transbh() {
    document.getElementById("back_home_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("back_home_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("back_home_button")
        .style
	.setProperty("border-color", "#08c");    
}


function trans2blueconf() {
    document.getElementById("confirm_button")
        .style
        .setProperty("color", "white")
    document.getElementById("confirm_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("confirm_button")
        .style
	.setProperty("border-color", "#08c");     
}

function blue2transconf() {
    document.getElementById("confirm_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("confirm_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("confirm_button")
        .style
	.setProperty("border-color", "#08c");      
}

function trans2bluecanc() {
    document.getElementById("cancel_button")
        .style
        .setProperty("color", "white")
    document.getElementById("cancel_button")
        .style
        .setProperty("background-color", "#08c")
    document.getElementById("cancel_button")
        .style
	.setProperty("border-color", "#08c");      
}

function blue2transcanc() {
    document.getElementById("cancel_button")
        .style
        .setProperty("color", "#08c")
    document.getElementById("cancel_button")
        .style
        .setProperty("background-color", "#333333")
    document.getElementById("cancel_button")
        .style
	.setProperty("border-color", "#08c");      
}
