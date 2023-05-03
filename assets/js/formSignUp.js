const inputGmail = document.getElementById('inputGmail');
const inputPassword = document.getElementById('inputPassword');
const inputRepeatPassword = document.getElementById('inputRepeatPassword');
const formSign = document.getElementById('formSign');
const notify = document.getElementById('notify');

const regexGmail = /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com/g;


formSign.onsubmit = () =>{
    if(!regexGmail.test(inputGmail.value)){
        notify.textContent = 'Vui lòng nhập địa chỉ gmail hợp lệ';
        return false;
    }

    else{
        if(inputPassword.value == inputRepeatPassword.value)
        return true;
        else{
            notify.textContent = 'Mật khẩu nhập lại không trùng nhau';
            return false;
        }
    }
}



