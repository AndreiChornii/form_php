'use strict'
var userName = document.querySelector("#username");
var userPass = document.querySelector("#userpass");
var userEmail = document.querySelector("#useremail");
var userSubscribe = document.querySelector("#usersubscribe");
var sendBtn = document.querySelector("#sendbtn");

function send() {

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

sendBtn.onclick = send;

