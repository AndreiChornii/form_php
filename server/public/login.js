'use strict'
var userName = document.querySelector("#username");
var userNameError = document.querySelector("#username + .auth__error");

var userEmail = document.querySelector("#useremail");
var userEmailError = document.querySelector("#useremail + .auth__error");

var userPhone = document.querySelector("#userphone");
var userPhoneError = document.querySelector("#userphone + .auth__error");

var userPass = document.querySelector("#userpass");
var userPassError = document.querySelector("#userpass + .auth__error");

var userSubscribe = document.querySelector("#usersubscribe");

var sendBtn = document.querySelector("#sendbtn");

function send() {

    var isError = false;

    if (!(/^[а-яa-z0-9\-_\.]{2,25}$/i.test(userName.value))){
        userNameError.classList.remove('auth__error_hide');
        userNameError.classList.add('auth__error_show');
        isError = true;
    }

    if (!(/^[0-9a-z.\-_]{1,15}@[0-9a-z.\-_]{1,14}\.[a-z.\-_]{1,10}$/i.test(userEmail.value))) {
        userEmailError.classList.remove('auth__error_hide');
        userEmailError.classList.add('auth__error_show');
        isError = true;
    }

    if (!(/^(\+380|380|80}0){1,4}[0-9]{9}$/i.test(userPhone.value))) {
        userPhoneError.classList.remove('auth__error_hide');
        userPhoneError.classList.add('auth__error_show');
        isError = true;
    }

    if (!(/^[а-яa-z0-9\-_\.]{2,25}$/i.test(userPass.value))) {
        userPassError.classList.remove('auth__error_hide');
        userPassError.classList.add('auth__error_show');
        isError = true;
    }

    if (isError) return null;

    var data = {
        name: userName.value,
        pass: userPass.value,
        email: userEmail.value,
        subscribe: userSubscribe.value,
    }

    fetch('/login', {
        method: 'POST',
        body: JSON.stringify(data)
    });
}

function setClearHandler(){
    var elements = document.querySelectorAll('.auth__text');

    elements.forEach(function(element) {
        element.onclick = function(){
            console.log(this.nextElementSibling);
            this.nextElementSibling.classList.remove('auth__error_show');
            this.nextElementSibling.classList.add('auth__error_hide');
        }
    })

    // console.log(elements);
}

setClearHandler();

sendBtn.onclick = send;

