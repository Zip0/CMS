<DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!--Jquery and stuff-->
<!--<script src="js/jquery-3.2.0.min.js"></script>-->

<!-- Scripts for buttons and stuff-->
<script src="js/test.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- This one works fine! -->
<script src="https://code.jquery.com/jquery.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/test.css">

<script src="https://code.jquery.com/jquery.js"></script>


        </head>
        <body>
            <header>
                <?php include 'views/header.php'; ?>
                <!--                <a href='?controller=posts&action=listCategories'>Posts</a>-->
            </header>

            <?php require_once('routes.php'); ?>

            <footer>

                <?php include 'views/footer.php'; ?>
            </footer>
        <body>
    </html>