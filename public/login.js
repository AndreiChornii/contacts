'use strict';

//sendBtn.onclick = send;

var formManager = {
    email: document.querySelector("#useremail"),
    emailError: document.querySelector("#useremail + .auth__error"),
    password: document.querySelector("#userpass"),
    passwordError: document.querySelector("#userpass + .auth__error"),
    sendBtn: document.querySelector("#sendbtn")
};

formManager.valid = function valid(){

    var isError = false;

    if (!(/^[0-9a-z.\-_]{1,15}@[0-9a-z.\-_]{1,14}\.[a-z.\-_]{1,10}$/i.test(this.email.value))) {
        this.emailError.classList.remove('auth__error_hide');
        this.emailError.classList.add('auth__error_show');
        isError = true;
    }

    if (!(/^[а-яa-z0-9\-_\.]{5,25}$/i.test(this.password.value))) {
        this.passwordError.classList.remove('auth__error_hide');
        this.passwordError.classList.add('auth__error_show');
        isError = true;
    }

    return !isError;
};

formManager.send = function send() {
    
//    console.log(!this.valid());

    if (!this.valid()) return null;

    var data = {
        email: this.email.value,
        password: this.password.value
    };

    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        if(data.is_error){
            let error_p = document.querySelector('.auth fieldset p');
  //        console.log(error_p);
            error_p.innerText = data.error;
        }
        else{
            window.location.assign(data.go_to);
        }
    });
};

formManager.setClearHandler = function setClearHandler(){
    var elements = document.querySelectorAll('.auth__text');

    elements.forEach(function(element) {
        element.onclick = function(){
            this.nextElementSibling.classList.remove('auth__error_show');
            this.nextElementSibling.classList.add('auth__error_hide');
        };
    });
};

formManager.init = function(){
    this.sendBtn.onclick = this.send.bind(this);// bind чтоб в this всегда было formManager
    this.setClearHandler();
};

formManager.init();