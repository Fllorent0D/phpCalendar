<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Demo Calendar">
    <meta name="author" content="Florent Cardoen">

    <title>Demo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Calendar</a>
        </div>
    </div>
</nav>

<div class="container">
    <?php
        include 'Calendar.class.php';
        $events = [
            ["date" =>"2015-07-13", "title" => "Label", "link" => "#"],
            ["date" =>"2015-07-23", "title" => "Texte", "link" => "#"],
            ["date" =>"2015-07-02", "title" => "Hello World", "link" => "#"]
        ];
        Calendar::drawCalendar(date("m"), date('Y'), $events);
    ?>

</div><!-- /.container -->

</body>
</html>

