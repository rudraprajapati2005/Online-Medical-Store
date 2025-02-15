let inputfield = document.getElementsByClassName('input_pass')[0];
let formElement = document.getElementById('form');
let warning = document.getElementById('warning');

function check() {
    if (inputfield.value == "") {
        inputfield.style.borderColor = "red";
        let a = document.createElement('p');
        warning.innerHTML = "";
        a.textContent = "Please enter a valid password.";
        a.style.color = "red";
        a.style.fontSize = "20px";
        warning.appendChild(a);
        formElement.action = ""; // prevent form submission
    } else {
        if(inputfield.value == "emp@1234")
        {
        inputfield.style.borderColor = "";
        warning.innerHTML = "";
        formElement.action = "password_check.php";
        formElement.submit();
        }
        else{
            inputfield.value = "";
            let a = document.createElement('p');
            warning.innerHTML = "";
            a.textContent = "Password is incorrect.";
            inputfield.style.borderColor = "red";
            a.style.fontSize = "20px";
            a.style.color = "red";
            warning.appendChild(a);
        }
    }
}
let select1 = document.getElementById('tablename')
select1.onchange = function(){
    console.log(select1.value);
    if(select1.value == "Select category")
    {
        document.getElementById('Button').style.display = "none"
        document.getElementById('signin').style.display = "none"
        document.getElementById('signup').style.display = "none"
    }
    if(select1.value != "Customer")
    {
        inputfield.style.display = "block"
        document.getElementById('Button').style.display = "block"
        document.getElementById('signin').style.display = "none"
        document.getElementById('signup').style.display = "none"
    }
    else{
        inputfield.style.display = "none"
        document.getElementById('Button').style.display = "none"
        document.getElementById('signin').style.display = "inline   "
        document.getElementById('signup').style.display = "inline"
    }
}
function render()
{
    formElement.action = "signup_index.php";
    formElement.submit()
}
function Login()
{
    formElement.action = "login_index.php"
    formElement.submit()
}