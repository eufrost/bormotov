<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/

require 'classes/Numbers.php';

$act = new Numbers;
$act->connectDb();

//adding and editing forms
$act->insertForm('add');
$act->insertForm('edit');


//adding a row from form
if (isset($_POST['numname'])) {
    $name = mysql_real_escape_string($_POST['numname']);
    $number = mysql_real_escape_string($_POST['number']);
    if (!preg_match('/(^\d+$)/', $number)) {
        $error = 'YOU NEED TO USE ONLY 0-9 DIGITS!!1';
        include 'error.html.php';
        die;
    }
    $act->insertInto($name, $number);
}

//delete row by id
if (isset($_GET['delete'])) {
    $act->deleteFrom($_POST['id']);
}

//edit row
if (isset($_POST['nameedit']) or isset($_POST['numberedit'])) {
    $id = mysql_real_escape_string($_POST['id']);
    $name = mysql_real_escape_string($_POST['nameedit']);
    $number = mysql_real_escape_string($_POST['numberedit']);
    $act->editRow($name, $number, $id);
}

//display all data
$sql = 'SELECT id, numname, number FROM nomera';
$result = mysql_query($sql) or die(mysql_error());

$list = [];
while ($row = mysql_fetch_assoc($result)) {
    $list[] = array('numname' => $row['numname'], 'number' => $row['number'], 'id' => $row['id']);
}

include 'list.html.php';