export const pswdCheck = (text, passwordError) => {
    let condition1 = /(?=.*\d)/; //should contain atleast 1 digit
    let condition2 = /(?=.*[a-z])/; //should contain atleast 1 lowercase
    let condition3 = /(?=.*[A-Z])/; //should contain atleast 1 uppercase
    let condition4 = /[a-zA-Z0-9]{8,}/; //should contain atleast 8 characters

    passwordError.style.color = "red";

    if (!text.match(condition1)) {
        passwordError.style.display = "block";
        passwordError.innerText = "Пароль должен содержать по крайней мере 1 цифру";
        return;
    }

    if (!text.match(condition2)) {
        passwordError.style.display = "block";
        passwordError.innerText = "Пароль должен содержать по крайней мере 1 строчную букву";
        return;
    }

    if (!text.match(condition3)) {
        passwordError.style.display = "block";
        passwordError.innerText = "Пароль должен содержать по крайней мере 1 заглавную букву";
        return;
    }

    if (!text.match(condition4)) {
        passwordError.style.display = "block";
        passwordError.innerText = "Пароль должен содержать не менее 8 символов";
        return;
    }

    passwordError.style.display = "none";
    return;
}