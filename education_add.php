<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['institute_name'] ) )
{
  
  if( $_POST['institute_name'] )
  {
    
    $query = 'INSERT INTO education (
        institute_name,
        program,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['institute_name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['program'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education record has been added' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education record</h2>

<form method="post">
  
  <label for="title">Institute Name:</label>
  <input type="text" name="institute_name" id="institute_name">
    
  <br>
  
  <label for="program">Program:</label>
  <input type="text" name="program" id="program">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <input type="submit" value="Add Education Record">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>