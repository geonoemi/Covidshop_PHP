<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megrendelések</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    </script>

    <link rel="stylesheet" href="css/styles.css">
    <!--Bootstrap de ez a bolondfaszú css úgyis felülírja majd-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <?php include 'views/nav.php'; ?>
    <!--Table-->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <!-- Table head -->
            <thead>
            <tr>
                <th>Felhasználó</th>
                <th>Rendelés</th>
                <th>Összeg</th>
                <th>Dátum</th>
            </tr>
            </thead>
            <!-- Table body -->
            <tbody>
            <?php
                foreach($VIEWDATA['orders'] as $order){
                    echo '
                        <tr>
                            <td>'.$order['username'],'</td>
                            <td>'.$order['items'].'</td>
                            <td>'.$order['price'].'</td>
                            <td>'.$order['date'].'</td>
                        </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
