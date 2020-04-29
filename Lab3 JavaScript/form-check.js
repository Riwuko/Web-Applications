const validate = (form) => {
    var isValid = true;
    const toValidate =  ["f_imie", "f_nazwisko","f_email", "f_ulica", "f_miasto","f_kod"];
    const messages = ["Brak imienia!","Brak nazwiska!", "Brak email!", "Brak ulicy!", "Brak miasta!", "Brak kodu!"];
    for (i in toValidate){
        if(!checkStringAndFocus(form.elements[toValidate[i]], messages[i], isWhiteSpaceOrEmpty))
            isValid=false;  
        else if (toValidate[i]=="f_email"){
            if(!checkStringAndFocus(form.elements[toValidate[i]], "Błędny email!", isEmailValid))
                isValid=false;  
        }
    }
    return isValid;
}

function changeVisibility(elem){
    const field = document.querySelector("span.".concat(elem));
    let visibility = "hidden";
    console.log(field);
    console.log(field.style.visibility);
    if (field.style.visibility=="hidden")
        visibility = "visible";
    console.log(visibility)
    field.style.visibility=visibility;
    console.log(field.style.visibility);
}

const isWhiteSpaceOrEmpty = (str) => { return /^[\s\t\r\n]*$/.test(str)}

const checkStringAndFocus = (obj, msg, validFunction) => {
    let str = obj.value;
    console.log(str)
    const errorFieldName = "form div.callout-".concat(obj.name);
    if(validFunction(str)){
        document.querySelector(errorFieldName).innerHTML = msg;
        document.querySelector(errorFieldName).style.visibility='visible';
        obj.focus();
        return false;
    }else{
        document.querySelector(errorFieldName).style.visibility='hidden';
        return true;
    }  
}

const cnt = (form, msg, maxSize) => {
    if(form.value.length>maxSize)
        form.value = form.value.substring(0, maxSize);
    else
        msg.innerHTML = maxSize - form.value.length;
}

function isEmailValid(str){
    let email = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z][a-zA-Z]+$/;
    if(!email.test(str))
        return true;
    else{
        return false;
    }
}

function buttonClick(form){
    if(!validate(form))
        return false;
}

