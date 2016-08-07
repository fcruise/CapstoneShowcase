<?php

function validateEmail(&$errors,$_POST, $email)
{

  $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
  if (!isset($_POST[$email]) || empty($_POST[$email]))
    $errors[$email] = 'required';

  else if (!preg_match($pattern, $_POST[$email]))
    $errors[$email] = 'invalid';
}

?>
