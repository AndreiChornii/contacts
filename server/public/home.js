'use strict';

function addButton(containerId) {
    var index = 0;
    for(const item of containerId.children){
        var button = document.createElement('button');
//        button.id = index;
        index++;
        button.innerText = 'X';
        item.prepend(button);
    }
}

function renderList(containerId, container){
//    console.log(containerId);
//    console.log(containerId.children);

    var div2 = document.querySelector('#block2');
    div2.innerHTML = '<ul></ul>';

    for(const item of containerId.children){
//        console.log(item);
        item.children[0].onclick = function(){
            // alert('Вы выбрали имя ' + item.innerText)
            if (item.parentNode.parentElement.id === 'block1') {
                item.remove();
//                console.log(item);
                div2.lastChild.appendChild(item);
                fetch('/insert', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(+item.id)
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
//                    alert('Даний контакт вже є в даного користувача');
                      if(data === 'inserted_ok'){
//                          div2.lastChild.appendChild(item);
                      }
                      else{
                          alert('Данный контакт уже есть у данного пользователя');
                      }
                })
                ;
            } else {
                item.remove();
//                console.log(item);
//                console.log(container);
//                console.log(container.lastChild);
                container.lastElementChild.appendChild(item);
                
                fetch('/delete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(+item.id)
                })
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    console.log(data);
//                    alert('Даний контакт вже є в даного користувача');
                })
                ;
            }
        };
    }
}

var container = document.querySelector('#block1');
var containerLi = document.querySelector('#block1 ul');
addButton(containerLi);

renderList(containerLi, container);

//console.log(container);