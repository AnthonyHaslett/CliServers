class Validation {
}

var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value !== confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }

    var y = document.getElementById("confirm_password");
    if (y.type === "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}

function validateUser() {
    var x = document.getElementById("userValid");

    x.innerHTML = "<p>Username or password is incorrect, try again</p>";
}

function validateSpam() {
    var x = document.getElementById("spamError");

    x.innerHTML = "<p>Anti spam data is incorrect, try again</p>";
}


