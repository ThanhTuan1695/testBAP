
$('#submit_create_note').on('click', function() {
   
    var title_create_note = $('#title_create_note').val();
    var body_create_note = $('#body_create_note').val();
    var ac = 'create';
    console.log(title_create_note);
    if (title_create_note == '' || title_create_note == '')
    {
        
        $('#formCreateNote .alert').removeClass('hidden');
        $('#formCreateNote .alert').html('Fill full in field,please.');
    }
    else
    {    
        $.ajax({
            url : 'note.php',
            type : 'POST', 
            data : {
                title_create_notej : title_create_note,
                body_create_notej : body_create_note,
                acj : ac
           
            }, success : function(data) {
                $('#formCreateNote .alert').removeClass('hidden');
                $('#formCreateNote .alert').html(data);
            }
        });
    }
});

$('#submit_edit_note').on('click', function() {
   
    var title_edit_note = $('#title_edit_note').val();
    var body_edit_note = $('#body_edit_note').val();
    var ac = 'edit'; 
    var id_edit_note = $('#id_edit_note').val(); 
 
   
    if (title_edit_note == '' || body_edit_note == '')
    {
     
        $('#formEditNote .alert').removeClass('hidden');
        $('#formEditNote .alert').html('Fill full the field, please.');
    }
    
    else
    {
        $.ajax({
            url : 'note.php', 
            type : 'POST', 
            data : {
                title_edit_notej : title_edit_note,
                body_edit_notej : body_edit_note,
                acj : ac,
                id_edit_notej : id_edit_note
          
            }, success : function(data) {
                
                $('#formEditNote .alert').html(data);
            },
            
        });
    }
});

$('#submit_delete_note').on('click', function() {
    var ac = 'delete'; 
    var id_edit_note = $('#id_edit_note').val();
 
    $.ajax({
        url : 'note.php', 
        type : 'POST', 
        
        data : {
            acj : ac,
            id_edit_notej : id_edit_note
       
        }, success : function(data) {
            $('#modalDeleteNote .alert').html(data);
        }
    });
});