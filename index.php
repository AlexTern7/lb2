<?php

require_once  __DIR__."/Lesson.php";

$lesson = new Lesson();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lab 2</title>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="post">
    <select name="group">
        <?php
        $lesson->groups();
        ?>
    </select>
    <input type="submit"><br>
</form>
<br>
<form action="" method="post">
    <select name="teacher">
        <?php
        $lesson->teachers();
        ?>
    </select>
    <select name="disciple">
        <?php
        $lesson->disciple();
        ?>
    </select>
    <input type="submit"><br>
</form>
<br>
<form action="" method="post">
    <input type="hidden" name="auditorium">
    <input type="submit" value="Все Аудитории"><br>
</form><br>
<?php
if (isset($_POST["group"])) {
    $lesson->labs($_POST["group"]);
} elseif (isset($_POST["teacher"])) {
    $lesson->lectures($_POST["teacher"], $_POST["disciple"]);
} elseif (isset($_POST["auditorium"])) {
    $lesson->auditoriums();
}
?>
<br>
<div id="load"></div><br>
<input type="button" value="Сохранить" onclick="set()">
<input type="button" value="Загрузить" onclick="show()">
</body>
</html>
