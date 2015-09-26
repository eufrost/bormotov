<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

//connect to db
include 'includes/dbo.inc.php';

//adding and editing forms
if (isset($_GET['add'])) {
    include 'form.html.php';
    exit();
}
if (isset($_GET['edit'])) {
    var_dump($_SERVER);die;
    include 'edit.html.php';
    exit();
}

//adding a row from form
if (isset($_POST['numname'])) {
    $name = mysql_real_escape_string($_POST['numname']);
    $number = mysql_real_escape_string($_POST['number']);
    if (!preg_match('/(^\d+$)/', $number)) {
        $error = 'YOU NEED TO USE ONLY 0-9 DIGITS!!1';
        include 'error.html.php';
        die;
    }
    $sql = "INSERT INTO nomera SET numname = '$name', number = '$number', adddate = CURDATE()";
    mysql_query($sql);
}

//delete row by id
if (isset($_GET['delete'])) {
    try {
        $sql = 'DELETE FROM nomera WHERE id = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Delete error: ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();

}

//edit row
if (isset($_POST['nameedit']) or isset($_POST['numberedit'])) {
    $id = mysql_real_escape_string($_POST['id']);
    $name = mysql_real_escape_string($_POST['nameedit']);
    $number = mysql_real_escape_string($_POST['numberedit']);
    $sql = "UPDATE nomera SET numname = '$name', number = '$number' WHERE id = '$id'";
    mysql_query($sql);
    /*$s = $pdo->prepare($sql);
    $s->bindValue(':numname', $_POST['nameedit']);
    $s->bindValue(':number', $_POST['numberedit']);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();*/
}

//display all data
$sql = 'SELECT id, numname, number FROM nomera';
$result = mysql_query($sql) or die(mysql_error());

$list = [];
while ($row = mysql_fetch_assoc($result)) {
    $list[] = array('numname' => $row['numname'], 'number' => $row['number'], 'id' => $row['id']);
}

include 'list.html.php';