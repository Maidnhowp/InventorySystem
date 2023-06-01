$('document').ready(function(){
    console.log(1)
    var username_state = false;
    var email_state = false;
    var password_state = false;
    var password2_state = false;

    $('#username').on('blur',()=>{
        let username = $('#username').val();
        if(username == ''){
            username_state = false;
            return;
        }
        $.ajax({
            url : 'register1.php',
            type : 'post',
            data : {
                'username_check' : 1,
                'username' : username
            },
            success: function(res){
                if(res == 'fail'){
                    username_state = false;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('box error');
                    $('#username').siblings("span").text("Username must have more 4 character");
                }
                else if (res == 'pass') {
                    username_state = true;
                    $('#username').parent().removeClass();
                    $('#username').parent().addClass('box success');
                    $('#username').siblings("span").text("");
                }
            }
        })
    });

    $('#email').on('blur',()=>{
        let email = $('#email').val();
        if(email == ''){
            email_state = false;
            return;
        }
        $.ajax({
            url : 'register1.php',
            type : 'post',
            data : {
                'email_check' : 1,
                'email' : email
            },
            success: function(res){
                if(res == 'fail'){
                    email_state = false;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('box error');
                    $('#email').siblings("span").text("Email invalid");
                }
                else if (res == 'pass') {
                    email_state = true;
                    $('#email').parent().removeClass();
                    $('#email').parent().addClass('box success');
                    $('#email').siblings("span").text("");
                }
            }
        })
    });
    
    $('#password').on('blur',()=>{
        let password = $('#password').val();
        if(password == ''){
            password_state = false;
            return;
        }
        $.ajax({
            url : 'register1.php',
            type : 'post',
            data : {
                'password_check' : 1,
                'password' : password
            },
            success: function(res){
                if(res == 'fail'){
                    password_state = false;
                    $('#password').parent().removeClass();
                    $('#password').parent().addClass('box error');
                    $('#password').siblings("span").text("Password must have more 4 character");
                }
                else if (res == 'pass') {
                    password_state = true;
                    $('#password').parent().removeClass();
                    $('#password').parent().addClass('box success');
                    $('#password').siblings("span").text("");
                }
            }
        })
    });

    $('#password2').on('blur',()=>{
        let password2 = $('#password2').val();
        if(password2 == ''){
            password2_state = false;
            return;
        }
        $.ajax({
            url : 'register1.php',
            type : 'post',
            data : {
                'password2_check' : 1,
                'password2' : password2
            },
            success: function(res){
                if(res == 'fail'){
                    password2_state = false;
                    $('#password2').parent().removeClass();
                    $('#password2').parent().addClass('box error');
                    $('#password2').siblings("span").text("Password not match");
                }
                else if (res == 'pass') {
                    password2_state = true;
                    $('#password2').parent().removeClass();
                    $('#password2').parent().addClass('box success');
                    $('#password2').siblings("span").text("");
                }
            }
        })
    });




    $('#reg_btn').on('click',()=>{
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();

        if(username_state == false || email_state == false || password_state == false || password2_state == false){
            $("#error_msg").text("Fix the errors in the form first");
        }
        else {
            $.ajax({
             url : 'register1.php',
             type : 'post',
             data : {
                "save" : 1,
                "email" : email,
                "username" : username,
                "password" : password,
             },
             success: function(res){
                alert("User saved");
                window.location.href = "../controller/login.php";
             }
            })
        }
    })
})
