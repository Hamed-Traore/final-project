// Select UI elements or inputs
const form = $('#form');
const firstname = $('#firstname');
const lastname = $('#lastname');
const email = $('#email')
const phone_number = $('#phone_number');
const password = $('#password');
const conf_password = $('#conf_password');

// username.keyup(function(e){
//     console.log(username.val())
// });

// error count
let errors = 0;


// show input error message
const showError = (displayPlace, message) => {
    displayPlace.html(message);
    errors += 1;
}

// check for required field
const checkRequired = (inputArr) => {
    
    inputArr.forEach(function(input){
        if(input.val() === '') {
            showError(input.next(), `${input.attr('id')} field is required`);
        }
    })
}

// check for input length
const checkInputLength = (input, min, max) => {

    if(input.val().length <= min){
        showError(input.next(), `${input.attr('id')} must be more than ${min} characters long`);
    } else if( input.val().length >= max){
        showError(input.next(), `${input.attr('id')} must be less than ${max} characters long`);
    }
}

const checkEmail = (input) => {
    const regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if(!regex.test(input.val())){
        showError(input.next(), 'Email is not valid');
    }
}

const checkPasswordMatch = (password, conf_password) => {
    if(password1.val() != password2.val()){
        showError(password2.next(), 'Your passwords do not match');
    }
}

// When form is submitted
// form.submit(function(e){
    
//     // Submit the form
// })

const validateForm = (e) =>{
    
    $('small').html('');
    errors = 0;

    // TODO check for required inputs
    checkRequired([firstname,lastname, email,phone_number,password, conf_password]);
    // check phone number length
    checkInputLength(phone_number, 8, 10);


    // TODO check for password length
    checkInputLength(password, 5, 10);
    
    // TODO check for valid email
    checkEmail(email);
    // TODO check if the passwords match
    checkPasswordMatch(password, conf_password);

    if(errors === 0){
        return true;
    }else{
        return false;
    }
}