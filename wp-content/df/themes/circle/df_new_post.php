<?php
    if(isset($_POST['submit']))
    {
        echo 'no error';
    // Do some minor form validation to make sure there is content
    if(trim($_POST['title'])==""){
        $ls_errmsg.="title field can't be blank<br>";	
    }
    if(trim($_POST['description'])==""){
        $ls_errmsg."description field can't be blank<br></p>";
    }
    if($ls_errmsg=="")
    {
        $title =  $_POST['title'];
        $description = $_POST['description'];
        $tags =$_POST['post_tags'];
        $cut=substr($description,0,20);
        $find="<a";
        $pos = strrpos($cut, $find);
        if ($pos === false) {
        // ADD THE FORM INPUT TO $new_post ARRAY
        $new_post = array(
            'post_title'    =>  $title,
            'post_content'  =>  $description,
            'post_author'  =>  $user_ID,
            'post_status'   =>  'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' =>  'post'
        );
        //SAVE THE POST
         $pid = wp_insert_post($new_post);
            if($pid){
               wp_set_post_tags($pid, $tags);
               wp_set_post_categories($pid, array($_POST['cat']));
            }
        }
    else
        {
            echo 'Error occured!';
        }

         //KEEPS OUR COMMA SEPARATED TAGS AS INDIVIDUAL
        wp_set_post_tags($pid, $_POST['post_tags']);

//REDIRECT TO THE NEW POST ON SAVE
//wp_redirect( '/test/' );

//ADD OUR CUSTOM FIELDS
//add_post_meta($pid, 'rating', $winerating, true); 

//INSERT OUR MEDIA ATTACHMENTS
        if ($_FILES) {
                foreach ($_FILES as $file => $array) {
                $newupload = insert_attachment($file,$pid);
                // $newupload returns the attachment id of the file that
                // was just uploaded. Do whatever you want with that now.
                }
        }
// END THE IF STATEMENT FOR FILES
    }
    else 
    {
        echo $ls_errmsg;
    }
}
 // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
 do_action('wp_insert_post', 'wp_insert_post');
?>