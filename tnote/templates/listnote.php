<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-primary">List note</h3>
            <div class="list-group">
                <?php
                $sql = "SELECT id_user FROM note.users WHERE username = '$user'";
                $e = $db->conn->prepare($sql);
                $e->execute();
                $row = $e->fetch(PDO::FETCH_ASSOC);
                $id = $row['id_user'];

                $sql_get_data_list_note = "SELECT * FROM notes WHERE user_id = '$id' ORDER BY id_note DESC";

                if ($db->num_rows($sql_get_data_list_note))
                {
                    foreach ($db->fetch_data($sql_get_data_list_note,PDO::FETCH_ASSOC) as $key => $data_list_note) {
                        $date_created = $data_list_note['date_created'];
                            $day_created = substr($date_created, 8, 2); 
                            $month_created = substr($date_created, 5, 2); 
                            $year_created = substr($date_created, 0, 4); 
                            $hour_created = substr($date_created, 11, 2); 
                            $min_created = substr($date_created, 14, 2); 
 
                       
                        if (strlen($data_list_note['body']) > 300)
                        {
                            $data_list_note['body'] = substr($data_list_note['body'], 0, 300).' ...';
                        }
                        else
                        {
                            $data_list_note['body'] = $data_list_note['body'];
                        }
 
                        echo '
                            <a href="index.php?ac=edit_note&&ide='.$data_list_note['id_note'].'" class="list-group-item ">
                                <h4 class="list-group-item-heading">'.$data_list_note['title'].'</h4>
                                <p class="list-group-item-text">'.$data_list_note['body'].'</p>
                                <small> Create Day
                                    '.$day_created.' Month
                                    '.$month_created.' Year
                                    '.$year_created.' When
                                    '.$hour_created.':'.$min_created.'
                                </small>
                             </a>         
                        ';
                    }                                               
                }
                
                else
                {
                   
                    echo '
                        <div class="alert alert-info">Now, you dont have notes.</div>
                    ';
                }
 
                ?>
            </div>
        </div>
    </div>
</div>