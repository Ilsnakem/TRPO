import { pswdCheck } from './controller.js';

let password = document.getElementById("pswd");
let passwordError = document.getElementById("pswdError");
passwordError.style.display = "none";
password.addEventListener('keypress', event => {
    let text = password.value + `${event.key}`;
    pswdCheck(text, passwordError);
})