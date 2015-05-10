<script>
function goBack()
  {
  window.history.back()
  }
</script>
<?php

    /* Template Name: Cancel Account */
if(!is_user_logged_in()){
    wp_safe_redirect(home_url());
    exit();
}
get_header();
$template_setting = kopa_get_template_setting();

$sidebars = $template_setting['sidebars'];
?>

<div class="wrapper">
<div class="row-fluid">
<div class="span12">
<div id="main-col">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>     
<?php the_content(); ?>   
<form action="" method="post">
	<input type="submit" value="Confirm" name="submit" class="green-button big-button">
	<input type="hidden" value="<?php echo get_current_user_id(); ?>" name="text">
	<input type="button" value="Cancel" name="cancel" class="green-button big-button" onclick="goBack()">
	
	</form>
	
	<?php
	if(isset($_POST['submit'])){
	$text=$_POST['text'];
	
	$sql='DELETE FROM dailycup_wp835.wp_users WHERE wp_users.ID = "'.$text.'"';
	
$retval = mysql_query( $sql );
if(! $retval )
{ 
   echo "Error Occured";
}else{
   echo "<h2 style='color:blue;'>Deleted account successfully</h2>";
}
}
	?>

<?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>

</div>
<div class="sidebar widget-area-1">
<?php
if (is_active_sidebar($sidebars[0])):
dynamic_sidebar($sidebars[0]);
endif;
?>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>