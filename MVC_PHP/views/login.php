<!--szar-->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kezdolap</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    </script>

    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "views/nav.php"?>

    <div class="container">
        <div class="login-box">
        <div class="row">
            <div class="col-md-6 login-left">
                <h2>Bejelentkezés</h2>
                <form action="index.php?c=login" method="post">
                    <div class="form-group">
                        <label>Felhasználónév</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jelszó</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="btnLogin">Login</button>
                </form>
            </div>
        </div>
        </div>
    </div>



 <div class="contact-us-wrapper">
        <a href="mailto:pandemia@citromail.hu">✉️ pandemia@citromail.hu</a>
    </div>

    <script src="js/cart.js"></script>
    <!--<script src="js/listing.js"></script>-->
</body>

</html>
