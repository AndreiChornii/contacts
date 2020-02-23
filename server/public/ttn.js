'use strict';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var field_ttn = document.querySelector('#userttn');
var button_ttn = document.querySelector('#sendbtn');

var formManager = {
    ttn: document.querySelector("#userttn"),
    ttnError: document.querySelector("#userttn + .auth__error"),
    sendBtn: document.querySelector("#sendbtn"),
};

formManager.valid = function valid(){

    var isError = false;

    if (!(/^[0-9]{14}$/i.test(this.ttn.value))) {
        this.ttnError.classList.remove('auth__error_hide');
        this.ttnError.classList.add('auth__error_show');
        isError = true;
    }

    return !isError;
};

formManager.send = function send() {
    
    if (!this.valid()) return null;

    var data = {
        ttn: this.ttn.value
    };

    fetch('/ttn', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    }).then(function(response){
        return response.json();
    }).then(function(data){
        if(data.rez === 'from new_post ok'){
            let ttn_table = document.querySelector("#ttn_table");
            let ttn = document.querySelector('#ttn'); 
            let Status = document.querySelector('#Status'); 
            let StatusCode = document.querySelector('#StatusCode'); 
            let ScheduledDeliveryDate = document.querySelector('#ScheduledDeliveryDate'); 
            ttn.innerText = data.ttn;
            Status.innerText = data.Status;
            StatusCode.innerText = data.StatusCode;
            ScheduledDeliveryDate.innerText = data.ScheduledDeliveryDate;
            ttn_table.style.display = "block";
            
//            формируем таблицу с ттн пользователя
            console.dir(data.ttns);
            
            var ttns_table_body = document.getElementById('ttns_table_body');
            
            while(ttns_table_body.firstChild){
                ttns_table_body.removeChild(ttns_table_body.firstChild);
            }
            
            for (var i = 0; i < data.ttns.length; i++) {
                var ttn_data = data.ttns[i]['ttn'];
                var Status_data = data.ttns[i]['Status'];
                var StatusCode_data = data.ttns[i]['StatusCode'];
                var ScheduledDeliveryDate_data = data.ttns[i]['ScheduledDeliveryDate'];
                
                var ttns_table = document.getElementById('ttns_table');
                
                var row = document.createElement("TR");
                var td0 = document.createElement("TD");
                var td1 = document.createElement("TD");
                var td2 = document.createElement("TD");
                var td3 = document.createElement("TD");

                td0.appendChild(document.createTextNode(ttn_data));
                td1.appendChild(document.createTextNode(Status_data));
                td2.appendChild(document.createTextNode(StatusCode_data));
                td3.appendChild(document.createTextNode(ScheduledDeliveryDate_data));

                row.appendChild(td0);
                row.appendChild(td1);
                row.appendChild(td2);
                row.appendChild(td3);

                ttns_table_body.appendChild(row);

                ttns_table.style.display = "block";
            }
        }
        else {
            console.dir(data);
            alert(data.rezult);
        }
    });
    let Status = document.querySelector('#Status');
    let StatusCode = document.querySelector('#StatusCode'); 
    let ScheduledDeliveryDate = document.querySelector('#ScheduledDeliveryDate');
    data.Status = Status.innerText;
    data.StatusCode = StatusCode.innerText;
    data.ScheduledDeliveryDate = ScheduledDeliveryDate.innerText;
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