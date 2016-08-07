<?php
function input_field($errors,$name,$label)
{
  echo '<div class="required_field">';
    label($name, $label);
    $value = posted_value($name);
    echo"<input type=\"text\" id=\"$name\" name=\"$name\" value=\"$value\"/>";
    errorLabel($errors, $name);
    echo '</div>';
  }

?>
