const loginModalSlider = document.querySelector('#loginModalSlider');
document.querySelector('#loginModalSlider button').addEventListener('click', () => {
    loginModalSlider.classList.toggle('active');
});




// check validity
// function checkFormValidity(event) {
//     event.preventDefault();
//     // console.log('event: ', event);
//     // console.log('event.target: ', event.target['email']);
//     // const targets = [...event.target]
//     // console.log('targets: ', targets);
    
//     const email = event.target['email'];
//     console.log('email: ', email);
//     // validate(email)
//     email.setCustomValidity('Hey, yo')
//     console.log('email.checkValidity(): ', email.checkValidity());
//     if (email.value.includes('@')) {
//         console.log('email is valid');
//         console.log(".willValidate: ", event.target['email'].willValidate)
//     } else {
//         console.log('email is invalid');
//         email.reportValidity()
//     }


// }



// const loginForm = document.querySelector('#loginform');
// const emailFormInput = document.querySelector('#emailforminput');
// loginForm.addEventListener('submit', checkFormValidity);
