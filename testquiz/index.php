<!-- require Models -->
<?php require_once 'models/Quiz.php'; ?>

<!-- require Controllers -->
<?php require_once 'contollers/QuizController.php'; ?>

<?php
    $quiz1 = new QuizController;

    $entry1 = $_POST['entry1'] ?? 'Lorem Ipsum';
?>


<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Punters PHP Quiz</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css">
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <!--<link rel="stylesheet" href="css/main.css"> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <!-- Add your site or application content here -->
        <main>
        	<h1>PHP Test Quiz</h1>

            <h2>Question 1</h2>
            <ol>
                <li>
                    <p>Write a function that determines if a string starts with an upper-case letter A-Z</p>
                    <form action="" method="post">
                        <input type="text" name="entry1" id="entry1" placeholder="<?php echo $entry1; ?>"><br><br>
                        <button type="submit">Check</button>
                    </form>
                    <p><?php echo $quiz1->query1($entry1); ?></p>
                </li>
            </ol>
            <p></p>
        </main>

        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.4.min.js"><\/script>')</script>
    </body>
</html>