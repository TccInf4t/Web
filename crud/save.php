<?php   

    if (!empty($_FILES['fileupload']))
    {
        move_uploaded_file($_FILES['fileupload']['tmp_name'], '../img/'.$_FILES['fileupload']['name']);  
        echo('img/'.$_FILES['fileupload']['name']);     
    }
    else
    {
        echo 'false';
    }
?>