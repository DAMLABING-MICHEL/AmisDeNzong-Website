$('.portfolio-menu ul li').click(function () {
    $('.portfolio-menu ul li').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr('data-filter');
    $('.portfolio-item').isotope({
        filter: selector
    });
    return false;
});
$(document).ready(function () {
    var popup_btn = $('.popup-btn');
    popup_btn.magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    $('#exampleModalLong').modal('toggle')
    var name = document.forms["register-form"]["name"];
    var email = document.forms["register-form"]["email"];
    var password = document.forms["register-form"]["password"];
    var passwordConfirm = document.forms["register-form"]["password_confirmation"];
    var submit = document.querySelector('#btn-submit');
    var errorname = document.getElementById('errorname');
    var validFields = 0
    submit.disabled = true
    name.addEventListener("keyup", function (event) {
        // var errorname = document.getElementById('errorname');
        var regname = /^[a-zA-Z]{2,10}$/;
        var validName = regname.test(name.value);
        if (name.value == "") {
            errorname.innerHTML = "you must fill in your name";
            errorname.style.color = "red";
            // submit.disabled = true
        } else if (validName == false && name.value.length < 2) {
            errorname.innerHTML = "please enter a valid name! minimum 2 characters.";
            errorname.style.color = "orange";
            // submit.disabled = false
        } else if (validName == false && name.value.length >= 10) {
            errorname.innerHTML = "please enter a valid name! maximum 10 characters.";
            errorname.style.color = "orange";
        } else {
            errorname.innerHTML = "";
            errorname.style.color = "limegreen";
            validFields += 1
        }
        buttunStatus()
    });
    email.addEventListener('keyup' , function () {
        var regmail = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/;
        if (email.value.length == 0) {
            errorEmail.innerHTML = "you must fill in your e-mail address";
            errorEmail.style.color = "red";   
        }
        else if (regmail.test(email.value) == false) {
            errorEmail.innerHTML = "invalid e-mail address";
            errorEmail.style.color = "red";   
        }
        else{
            errorEmail.innerHTML = "";
            errorEmail.style.color = "limegreen";
            validFields += 1
        }
        buttunStatus()
    })
    password.addEventListener('keyup' , function () {
        if (password.value.length == 0) {
            errorPassword.innerHTML = "you must fill in your password";
            errorPassword.style.color = "red";   
        }
        else if ( password.value.length >= 8) {
            errorPassword.innerHTML = "";
            validFields += 1
        }
        else{
            errorPassword.innerHTML = "please enter a correct password.minimum 8 characters!";
            errorPassword.style.color = "red";
        }
        buttunStatus()
    })
    passwordConfirm.addEventListener('keyup' , function () {
        if (passwordConfirm.value.length == 0 || password.value != passwordConfirm.value) {
            errorPasswordConfirm.innerHTML = "you must confirm your password";
            errorPasswordConfirm.style.color = "red";   
        }
        else{
            errorPasswordConfirm.innerHTML = "";
            validFields += 1
        }
        buttunStatus()
    })
    function buttunStatus() {
        if(validFields == 4){
            submit.disabled = false
        }
        if (name.value != "" && email.value != "" && password.value != "" && passwordConfirm.value != "" &&
            (errorname.innerHTML == "" && errorEmail.innerHTML == "" && errorPassword.innerHTML == "" && errorPasswordConfirm.innerHTML == "")) {
            submit.disabled = false
        } else {
            submit.disabled = true
        }
    }
});
//   start post comment
(() => {
    // Variables
    const postSlug = document.getElementById('postSlug')
    const headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    }
    const commentId = document.getElementById('commentId');
    const alert = document.getElementById('alert');
    const message = document.getElementById('message');
    const forName = document.getElementById('forName');
    const abort = document.getElementById('abort');
    const commentIcon = document.getElementById('commentIcon');
    // Add comment
    const addComment = async e => {
        e.preventDefault();
        // Get datas
        const datas = {
            message: message.value
        };
        if (document.querySelector('#commentId').value != '') {
            datas['commentId'] = commentId.value;
        }
        // Icon
        commentIcon.hidden = false;
        // Send request
        const response = await fetch(`/blog-single/${postSlug.value}`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(datas)
        });
        // Wait for response
        const data = await response.json();
        // Icon
        commentIcon.hidden = true;
        // Manage response
        if (response.ok) {
            purge();
            if (data == 'ok') {
                showComments();
                showAlert('infos', 'success', 'Your comment has been saved');
            } else {
                showAlert('info', 'Thanks for your comment. It will appear when an administrator has validated it. Once you are validated your other comments immediately appear.');
            }
        } else {
            if (response.status == 422) {
                showAlert('error', 'error', data.errors.message[0]);
            } else {
                errorAlert();
            }
        }
    }
    const errorAlert = () => Swal.fire({
        icon: 'error',
        title: 'Whoops!',
        text: 'Something went wrong'
    });
    // Show alert
    // const showAlert = (type, text) => {
    //     alert.style.display = 'block';
    //     alert.className = '';
    //     alert.classList.add('alert-box', 'alert-box--' + type);
    //     alert.firstChild.textContent = text;
    // }
    const showAlert = (icon, title, text) => Swal.fire({
        icon: icon,
        title: title,
        text: text,
    });
    // Hide alert
    const hideAlert = () => alert.style.display = 'none';
    // Prepare show comments
    const prepareShowComments = e => {
        e.preventDefault();
        document.getElementById('showbutton').toggleAttribute('hidden');
        document.getElementById('showicon').toggleAttribute('hidden');
        showComments();
    }
    // Show comments
    const showComments = async () => {
        // Send request
        const response = await fetch(`/blog-single/${postSlug.value}/comments`, {
            method: 'GET',
            headers: headers
        });
        // Wait for response
        const data = await response.json();
        document.getElementById('commentsList').innerHTML = data.html;
        // if(Auth::check())
        // 	document.getElementById('respond').hidden = false;
        // @endif
    }
    // Reply to comment
    const replyToComment = e => {
        e.preventDefault();
        forName.textContent = `'Reply to' ${e.target.dataset.name}`;
        commentId.value = e.target.dataset.id;
        abort.hidden = false;
        message.focus();
    }
    // Abort reply
    const abortReply = (e) => {
        e.preventDefault();
        purge();
    }
    // Purge reply
    const purge = () => {
        forName.textContent = '';
        commentId.value = '';
        message.value = '';
        abort.hidden = true;
    }
    // Listener wrapper
    const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
        const element = document.querySelector(selector);
        if (element) {
            document.querySelector(selector).addEventListener(type, e => {
                if (eval(condition)) {
                    callback(e);
                }
            }, capture);
        }
    };
    // Set listeners
    window.addEventListener('DOMContentLoaded', () => {
        wrapper('#showcomments', 'click', prepareShowComments);
        wrapper('#abort', 'click', abortReply);
        wrapper('#message', 'focus', hideAlert);
        wrapper('#messageForm', 'submit', addComment);
        wrapper('#commentsList', 'click', replyToComment, "e.target.matches('.replycomment')");
    })


    // Delete comment
    const deleteComment = async e => {
        var comment = document.getElementById('getComment').value
        e.preventDefault();
        Swal.fire({
            title: 'Really delete this comment ?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            preConfirm: () => {
                return fetch(`/blog-single/comments/${comment}`, {
                        method: 'DELETE',
                        headers: headers
                    })
                    .then(response => {
                        if (response.ok) {
                            showComments();
                        } else {
                            errorAlert();
                        }
                    });
            }
        });
    }
    // Set listeners
    window.addEventListener('DOMContentLoaded', () => {
        wrapper('#commentsList', 'click', deleteComment, "e.target.matches('.deletecomment')");
    })

    // subscribe to newsletter
    var email = document.getElementById('email')
    var emailError = document.getElementById('email-error')
    const subscribeToNewsletter = async e => {
        e.preventDefault();
        // Get datas
        const datas = {
            email: email.value
        };
        // Send request
        const response = await fetch(`/newsletter/`, {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(datas)
        });
        // Wait for response
        const data = await response.json();

        // Manage response
        if (response.ok) {
            if (data == 'subscribe') {
                window.alert('You need to confirm your subscription, please check your email:' + email.value)
            } else {
                showAlert('info', 'you have already subscribed');
            }
        } else {
            if (response.status == 422) {
                emailError.innerText = data.message
            } else {
                errorAlert();
            }
        }
    }

    window.addEventListener('DOMContentLoaded', () => {
        wrapper('#newsletter-form', 'submit', subscribeToNewsletter);
    })
})()
