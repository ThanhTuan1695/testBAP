$('#submit_change_pass').on('click', function() {
   
    var old_pass = $('#old_pass').val();
    var new_pass = $('#new_pass').val();
    var re_new_pass = $('#re_new_pass').val();
 
   
    if (old_pass == '' || old_pass == '' || re_new_pass == '')
    {
        $('#formChangePass .alert').removeClass('hidden');
        $('#formChangePass .alert').html('Fill full field. pleae!!!');
    }
  
    else
    {
        $.ajax({
            url : 'change-pass.php', 
            type : 'POST', 
           
            data : {
                old_passj : old_pass,
                new_passj : new_pass,
                re_new_passj : re_new_pass
            
            }, success : function(data) {
                $('#formChangePass .alert').removeClass('hidden');
                $('#formChangePass .alert').html(data);
            }
        });
    }
});