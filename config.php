<!DOCTYPE html>
<html>
  <head>
    <title>Setting up database</title>
  </head>
  <body>

    <h3>Setting up...</h3>

<?php 
  require_once 'functions.php';

  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16)');

  createTable('preferences',
              'user VARCHAR(16),
			   presentation_id INT UNSIGNED,
               preference VARCHAR(16)');

  createTable('presentations',
              'presentation_id INT UNSIGNED PRIMARY KEY,
			  topic VARCHAR(100),
			  speaker VARCHAR(100),
              date DATETIME');
?>

    <br>...done.
  </body>
</html>
