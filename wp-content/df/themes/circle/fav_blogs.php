<?php
require $_SERVER['DOCUMENT_ROOT']."dailyfoodies2/wp-load.php";
$user_id = $_REQUEST['user_id'];
$blog_id = $_REQUEST['blog_id'];
$post_id = $_REQUEST['post_id'];
$fav_posts = get_user_meta($user_id, 'fav_blogs', true);
$fav_posts = unserialize($fav_posts);
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'remove'){
    unset($fav_posts['fav_'.$blog_id.'_'.$post_id]);
    $remove = 1;
    $update = update_user_meta($user_id, 'fav_blogs', serialize($fav_posts));
}
else{
    $user_meta_arr = array(
        'fav_'.$blog_id.'_'.$post_id => array(
            'blog_id' => $blog_id,
            'post_id' => $post_id
        )
    );
    if(!empty($fav_posts)){
        array_push_associative($user_meta_arr, $fav_posts);
    }
   $update = update_user_meta($user_id, 'fav_blogs', serialize($user_meta_arr));
}
if($update){ 
    if(isset($remove) && $remove == 1){
        echo 'ADD TO FAVORITES';
    }else{
        echo 'REMOVE FROM FAVORITES';
    }
}
else{
    echo 'There is an error occured. Please try again!';
}
?>