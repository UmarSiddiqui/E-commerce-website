
//sign up page form validation
function onsubmitForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var atEmail=email.indexOf("@");
    var dotEmail=email.indexOf(".");
    var password = document.getElementById("password").value;
    var confirmpassword = document.getElementById("confirmpassword").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var country = document.getElementById("country").value;

    //name validation
    if (name == "") {//if name is empty
        alert("Please enter your name");
        return false;
    }

    //validate email
    if (email == "") {//if email is empty
        alert("Please email must be filled out");
        return false;
    }else if (atEmail == -1) {//if @ is not found
        alert("@ sign is missing. Please enter a valid email");
        return false;
    }else if (dotEmail == email-1) {//if . is not found
        alert("Dot is not accepatable at the end.Please enter a valid email");
    return false;
    }

    //password validation
    if (password == "") {//if password is empty
        alert("Please password must be filled out");
        return false;
    }

     if (confirmpassword == "") {//if confirm password is empty
        alert("Please confirm password must be filled out");
        return false;

    }else if(password!=confirmpassword){//password and confirmpassword must be same
        alert("Password and confirm password must be same");
        return false;
    }

    //phone number validation
    if (phone == "") {
        alert("Please enter your phone number");//if phone number is empty
        return false;
    } else if (phone.length !=10) {//phone number must be 10 digits
        alert("Please enter valid phone number");
        return false;
    }else if (isNaN(phone)) {//phone number must be numeric
        alert("Please enter valid phone number");
        return false;
    }else if (phone.charAt(0)!=0) {//phone number must start with 0
        alert("Please enter valid phone number");
        return false;
    }


    //address validation
    if (address == "") {               //if address is empty
        alert("Please enter your address");
        return false;
     } else if (address.length > 50) {    //address must be less than 50 characters
        alert("Please enter valid address");
        return false;
    }


    //country validation
    if (country == "") {          //if country is empty
        alert("Please country must be filled out");
        return false;
    }else if (country.length > 30 ) {  //country must be less than 20 characters
        alert("Please enter valid country name ");
        return false;
		}
alert (“Form Submit Successfully”);
}
}

}

//login page form validation
// function onsubmitForm() {