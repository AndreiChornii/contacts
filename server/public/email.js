'use strict';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var field_email = document.querySelector('#useremail');
var button_email = document.querySelector('#sendbtn');
//console.log(field_email);
console.log(button_email);
button_email.disabled = true;
field_email.onchange = function changeEmail() {
//    console.log('changed');
    field_email.disabled = true;
    button_email.textContent = "Save";
    button_email.disabled = false;
};

var formManager = {
    email: document.querySelector("#useremail"),
    emailError: document.querySelector("#useremail + .auth__error"),
    sendBtn: document.querySelector("#sendbtn")
};

formManager.valid = function valid(){

    var isError = false;

    if (!(/^[0-9a-z.\-_]{1,15}@[0-9a-z.\-_]{1,14}\.[a-z.\-_]{1,10}$/i.test(this.email.value))) {
        this.emailError.classList.remove('auth__error_hide');
        this.emailError.classList.add('auth__error_show');
        isError = true;
    }

    return !isError;
};

formManager.send = function send() {
    
    if (!this.valid()) return null;

    var data = {
        email: this.email.value
    };

    fetch('/email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    }).then(function(response){
//        console.log(this);
        return response.json();
    }).then(function(data){
        console.log(data);
        alert(data.message);
    });
};

formManager.setClearHandler = function setClearHandler(){
    var elements = document.querySelectorAll('.auth__text');

    elements.forEach(function(element) {
        element.onclick = function(){
            this.nextElementSibling.classList.remove('auth__error_show');
            this.nextElementSibling.classList.add('auth__error_hide');
        }
    });
}

formManager.init = function(){
    this.sendBtn.onclick = this.send.bind(this);// bind чтоб в this всегда было formManager
    this.setClearHandler();
}

formManager.init();


/*

*/