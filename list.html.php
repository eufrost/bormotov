<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="css/table.css">
    <meta charset="utf-8">
    <title>List</title>
</head>
<body>
<p><a href="?add">Add number</a></p>

<p>List of numbers:</p>
<table>
    <tr>
        <th>Name:</th>
        <th colspan="2">Number:</th>
    </tr>
    <?php foreach ($list as $item): ?>
        <tr>
            <td><?php echo $item['numname']; ?></td>
            <td><?php echo $item['number']; ?></td>
            <td>
                <form action="?delete" method="post">
                    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                    <input class="button-del" type="submit" value="-"></form>
                <form action="?edit" method="post">
                    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                    <input type="hidden" name="numname" value="<?php echo $item['numname'] ?>">
                    <input type="hidden" name="number" value="<?php echo $item['number'] ?>">
                    <input class="button-edit" type="submit" value=" ">
                </form>
            </td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>