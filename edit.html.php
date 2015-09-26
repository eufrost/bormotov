<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit number</title>
</head>
<body>
<p>

<form action="?" method="post">

    <label for="numname">Name: <input type="text" name="nameedit" id="numname" value="<?php echo $_POST['numname'] ?>"></label>
    <label for="number">Number: <input type="text" name="numberedit" id="number" value="<?php echo $_POST['number'] ?>"></label>
    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?> ">
    <input type="submit" value="Edit">
</form>
</p>
</body>
</html>