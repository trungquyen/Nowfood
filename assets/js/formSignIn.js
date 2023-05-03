const inputGmail = document.getElementById('inputGmail');
const inputPassword = document.getElementById('inputPassword');
const checkRemember = document.getElementById('checkRemember');
const formSign = document.getElementById('formSign');
const notify = document.getElementById('notify');

const regexGmail = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/g;

formSign.onsubmit = () =>{
    if(!regexGmail.test(inputGmail.value)){
        notify.textContent = 'Vui lòng nhập địa chỉ gmail hợp lệ';
        return false;
    }
    else{
        return true;
    }
}



