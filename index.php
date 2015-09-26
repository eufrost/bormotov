<?php

//connect to db
include 'includes/dbo.inc.php';

//adding and editing forms
if (isset($_GET['add'])) {
    include 'form.html.php';
    exit();
}
if (isset($_GET['edit'])) {
    include 'edit.html.php';
    exit();
}

//adding a row from form
if (isset($_POST['numname'])) {
    try {
        $sql = 'INSERT INTO nomera SET numname = :numname, number = :number, adddate = CURDATE()';
        $s = $pdo->prepare($sql);
        $s->bindValue(':numname', $_POST['numname']);
        $s->bindValue(':number', $_POST['number']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Adding error: ' . $e->getMessage();
        include 'error.html.php';
    }
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
    $sql = 'UPDATE nomera SET numname = :numname, number = :number WHERE id = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':numname', $_POST['nameedit']);
    $s->bindValue(':number', $_POST['numberedit']);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
}

//display all data
try {
    $sql = 'SELECT id, numname, number FROM nomera';
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    $error = 'SELECT error: ' . $e->getMessage();
    include "error.html.php";
    exit();
}
$list = [];
while ($row = $result->fetch()) {
    $list[] = array('numname' => $row['numname'], 'number' => $row['number'], 'id' => $row['id']);
}
include 'list.html.php';