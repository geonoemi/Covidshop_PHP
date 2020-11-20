<?php include('controllers/registry.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Regisztráció</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	
  <form method="post" action="controllers/registry.php">
  	<!--?php include('errors.php'); ?-->
      <?php  if (count($errors) > 0) : ?>
        <div class="error">
            <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
            <?php endforeach ?>
        </div>
        <?php  endif ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit">Register</button>
  	</div>
  </form>
</body>
</html>