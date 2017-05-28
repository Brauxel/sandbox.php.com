<!-- require Controllers -->
<?php require_once 'controllers/QuizController.php'; ?>
<?php require_once 'controllers/CatController.php'; ?>

<?php
    $quiz1 = new QuizController;
    $sprinkles = new CatController;

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
                        <input type="text" name="teststr" id="teststr" value="<?php echo $_POST['teststr'] ?? 'Lorem Ipsum'; ?>"><br><br>
                        <button type="submit">Check</button>
                    </form>
                    <p><?php echo $quiz1->checkFirstCase($_POST['teststr'] ?? 'Lorem Ipsum'); ?></p>
                </li>

                <li>
                    <p>Write a function that determines the area of a circle given the radius.</p>
                    <form action="" method="post">
                        <input type="number" name="radius" id="radius" value="<?php echo $_POST['radius'] ?? 0; ?>" step="any" min="0"><br><br>
                        <button type="submit">Get Area</button>
                    </form>
                    <p><?php echo $quiz1->getArea($_POST['radius'] ?? 0); ?></p>
                </li>

                <li>
                    <p>Write a function that can sum all of the values in any given array.</p>
                    <form action="" method="post">
                        <input type="number" name="numbers[]" id="radius" value="<?php echo ( empty($_POST['numbers'][0]) ? 1: $_POST['numbers'][0] ); ?>" step="any"><br><br>
                        <input type="number" name="numbers[]" id="radius" value="<?php echo ( empty($_POST['numbers'][1]) ? 2: $_POST['numbers'][1] ); ?>" step="any"><br><br>
                        <input type="number" name="numbers[]" id="radius" value="<?php echo ( empty($_POST['numbers'][2]) ? 3: $_POST['numbers'][2] ); ?>" step="any"><br><br>
                        <button type="submit">Get Sum</button>
                    </form>
                    <p><?php echo $quiz1->getSum($_POST['numbers'] ?? array(1, 2, 3 )); ?></p>
                </li>

                <li>
                    <p>What does "extends" do to the following "Cat" class?<br><br>class Cat extends Animal<br>&nbsp;&nbsp;&nbsp;&nbsp;{<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;// Code Goes Here<br>&nbsp;&nbsp;&nbsp;&nbsp;}</p>
                    <p>The "extends" is used to wield the inheritance capabilities of PHP. Since the 'Cat' class "extends" the 'Animal' class, all the public and protected properties (variables and functions) of 'Animal' are inherited by 'Cat'. The inherited properties retain their original functionality unless overwritten in the 'Cat' class. Private properties can't be passed down from a parent to a child.</p>
                </li>

                <li>
                    <p>Create a function called "purr()" in the "Cat" class (above) and Echo 'purr' every x seconds with a specified delay to start purring</p>
                    <form action="" method="post">
                        <input type="number" name="startdelay" id="startdelay" value="<?php echo $_POST['startdelay'] ?? 0; ?>" min="0"><br><br>
                        <input type="number" name="delay" id="delay" value="<?php echo $_POST['delay'] ?? 0; ?>" required min="0"><br><br>
                        <input type="number" name="purrcount" id="purrcount" value="<?php echo $_POST['purrcount'] ?? 1; ?>" required min="1"><br><br>                        
                        <button type="submit">Run Purr</button>
                    </form>
                    <p><?php $sprinkles->purr($_POST['startdelay'] ?? 0, $_POST['delay'] ?? 0, $_POST['purrcount'] ?? 1); ?></p>
                </li>
            </ol>
        </main>

        <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.4.min.js"><\/script>')</script>
    </body>
</html>