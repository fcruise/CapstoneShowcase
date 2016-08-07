<html>
  <?php

  require 'validate.inc';
  $errors = array();
  validateEmail($errors, $_POST, 'email');
    if ($errors)
    {
      echo 'Errors: <br/>';
      foreach ($errors as $field => $error)
        echo "$email $error<br/>";

    }
    else {
        echo 'Data OK!';
    }


    // foreach ($_POST as $key => $value)
    // echo "($key) => ($value),br/>";
    // require 'validate.inc';
    // $errors = array();
    // validateEmail($errors, $_POST, 'email');
    // if ($errors)
    //   {
    //     echo'Errors:<br/>';
    //     foreach ($errors as $field => $error)
    //       echo "$field $error <br/>;
    //     }
    // else
    //   echo 'Data OK!';

      ?>
