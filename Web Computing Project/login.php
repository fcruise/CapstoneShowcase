<head>
<?php include 'menu.inc'; ?>
</head>


<?php

session_start();

require 'database.php';
if(!empty($_POST['email']) && !empty($_POST['password'])):

  $records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
  $records->bindParam(':email',$_POST['email']);
  $records->execute();
  $results = $records ->fetch(PDO::FETCH_ASSOC);

  $message ='';

  if(count($results) > 0 && password_verify($_POST['password'], $results['password'])) {

    $_SESSION['user_id'] = $results['id'];
    header("LOcation: /");

  } else {
    $message = "Sorry"
  }

  ?>

 <div id="info">
  <h1> Login </h1>
  <span> or <a href="register.php"> register here </a></span>

<?php if(!empty($message)): ?>
  <p><?= $message ?> <p>
  <?php endif; ?>

  <form action="login.php" method="POST">
    <input type="text" placeholder="Enter your Email" name="email"></br></br>
    <input type="password" placeholder="Enter Password" name="password"></br></br>
    <input type="submit">

  </div>
