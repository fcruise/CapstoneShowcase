<html>
<head>
	<?php
	include ('include/menu.inc');
	?>

		<link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<!--
		<div id="sidebar_left">
			<img src="brisbane-sign-night.jpg"/>
		</div> -->

		<div id="info">
					<h1>Register Here</h1>

					<?php
					error_reporting(E_ALL ^ E_NOTICE);
  $errors = array();
  if (isset($_POST['email']))
  {
    require 'include/validate.inc';
    validateEmail($errors, $_POST, 'email');
    if ($errors) {
      echo '<h1> Invalid, correct the following errors:</h1>';
      foreach ($errors as $email => $error)
        echo "$email $error</br>";

        //redisplay the form
        include 'include/form1.inc';

    }
    else
    {
			include('include/project_connect_db.inc');
			if ($_POST)
			{
				try
				{
					$stmt = $pdo->prepare('INSERT INTO members (name, pass_word, email, gender_male, gender_female, birth_day, birth_month, birth_year, QLD, zipcode) VALUES (:name, :pass_word, :email, :gender_male, :gender_female, :birth_day, :birth_month, :birth_year, :QLD,:zipcode)');
					$stmt->bindValue(':name', $_POST['name']);
					$stmt->bindValue(':pass_word', $_POST['pass_word']);
					$stmt->bindValue(':email', $_POST['email']);
					$stmt->bindValue(':birth_day', $_POST['birth_day']);
					$stmt->bindValue(':birth_month', $_POST['birth_month']);
					$stmt->bindValue(':birth_year', $_POST['birth_year']);
					$stmt->bindValue(':QLD', $_POST['QLD']== 'on', PDO::PARAM_INT);
					$stmt->bindValue(':zipcode', $_POST['zipcode']);
					$stmt->bindValue(':gender_male', $_POST['gender_male'] == 'on', PDO::PARAM_INT);
					$stmt->bindValue(':gender_female', $_POST['gender_female'] == 'on', PDO::PARAM_INT);

					$stmt->execute();
					echo 'Account Created!<br/>';
				}
				catch (PDOException $e)
				{
					echo $e->getMessage();
				}
			}
      echo 'form submitted successfully with no errors';}

  } else
    include 'include/form1.inc';

?>

		</div>

	</body>
</html>
