<?php

class Numbers
{


    public function connectDb() {
        $login = 'nomera';
        $pwd = '1474147';

        mysql_connect('localhost', $login, $pwd) or die(mysql_error());
        mysql_select_db('nomera');
        mysql_query('SET NAMES "UTF8"');

    }

    public function insertInto($name, $number) {
        $sql = "INSERT INTO nomera SET numname = '$name', number = '$number', adddate = CURDATE()";
        mysql_query($sql);
    }

    public function deleteFrom($id) {
        $sql = "DELETE FROM nomera WHERE id = '$id'";
        mysql_query($sql);
        header('Location: .');
    }

    public function editRow($name, $number, $id) {
        $sql = "UPDATE nomera SET numname = '$name', number = '$number' WHERE id = '$id'";
        mysql_query($sql);

    }

    public function insertForm($action)
    {
        if (isset($_GET["$action"])) {
            if ($action=='add') {
                include $_SERVER['DOCUMENT_ROOT'] . "/new/form.html.php";
            }
            if ($action=='edit') {
                include $_SERVER['DOCUMENT_ROOT'] . "/new/edit.html.php";
            }
            exit();
        }
    }

    public function screen($var) {
        return mysql_real_escape_string($var);
    } //useless for now



}
