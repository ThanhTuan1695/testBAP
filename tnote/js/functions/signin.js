$('#submit_signin').on('click', function() {
    
    var user_signin = $('#user_signin').val();
    var pass_signin = $('#pass_signin').val();
 
    
    if (user_signin == '' || pass_signin == '')
    {
        $('#formSignin .alert').removeClass('hidden');
        $('#formSignin .alert').html('Please input full field.');
    }
    else
    {
        $.ajax({
            url : 'signin.php', 
            type : 'POST', 
           
            data : {
                user_signinj : user_signin,
                pass_signinj : pass_signin
            }, success : function(data) {
                $('#formSignin .alert').html(data);
            }
        });
    }
});