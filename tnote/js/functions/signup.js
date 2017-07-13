$('#submit_signup').on('click',function() {
	var user_signup = $('#user_signup').val();	
	var pass_signup = $('#pass_signup').val();
	var repass_signup = $('#repass_signup').val();

	if (user_signup == '' ||  pass_signin == '' || repass_signup == '') {
		$('#formSignup .alert').removeClass('hidden');
		  $('#formSignup .alert').html('Please input full field.');
	}else{
		$.ajax({
			url : 'signup.php',
			type : 'post',
			data :{
				user_signupj : user_signup,
				pass_signupj : pass_signup,
				repass_signupj : repass_signup,
			},
			success : function (data) {
				
				$('#formSignup .alert').html(data);
			},
			error: function(data){
			}
		});
	}

});