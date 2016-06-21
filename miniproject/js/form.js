 $(function() {
            $("#username").focus();

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    function displaydp(){
    
        $('#profilepic').css("display","block");
    }
    
    $('#username').bind('keypress', function(e) {
        if(e.keyCode===9){
            var $name=$('#username').val();
            alert("hiii");
            $('#profilepic').attr('src',"img/"+$name+".jpg");
            displaydp();
            $('#password').focus();
        }
        
});


});