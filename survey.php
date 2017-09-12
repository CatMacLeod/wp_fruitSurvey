<?php
/* Template Name: Fruit Survey */

get_header(); 

?>

<div class="wrap">

<h1>What's your favorite fruit</h1>
<div id="container">&nbsp;</div>

<?php
$prefix = 'a00742038';
?>

<form  method="POST">
<br>Your name:
<br><input type="text"  name="<?php echo $prefix; ?>_name" />
<br>Your favorite fruit: 
<br><input type="radio" name="<?php echo $prefix; ?>_fruit" value="Apple" />Apple
<br><input type="radio" name="<?php echo $prefix; ?>_fruit" value="Banana"     />Banana
<br><input type="radio" name="<?php echo $prefix; ?>_fruit" value="Orange"   />Orange
<br>
<br><input type="submit" value="Submit" />
</form>

<?php
if(
   isset($_POST[$prefix.'_name']) && !empty($_POST[$prefix.'_name']) &&
   isset($_POST[$prefix.'_fruit']) && !empty($_POST[$prefix.'_fruit'])
):
   add_option($prefix.'_'.date('ymdHis').'_'.uniqid(), json_encode($_POST));//adds name/option pair to db
?>
   <script>
      alert("Thanks for submitting your data!");
      location.href = 'http://localhost:8888/catSite/fruit-survey/';
   </script>
<?php
   endif;
?>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="<?php echo get_stylesheet_directory_uri().'/bar.js'; ?>"></script>

<script>
highcharts_bar(<?php echo get_fruit_data($prefix); ?>);
</script>
<h5><b>This survey is a data-driven CMS-based application for the users
 to submit their personal data and for the application to display the data in a user-friendly,
  graphical form.</b></h5>
</div><!-- .wrap -->

<?php get_footer(); ?>
