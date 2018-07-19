<?php

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <link rel="stylesheet" type="text/css" href="<?=CSS?>main.css">
</head>
<body>
<div class="container">
    <form action="<?=PROJROOT?>add" method="post" class="data">
        <input type="text" name="name">
        <input type="submit" value="ADD">
    </form>
    <ul class="list">
    <?php for($i=0;$i<count($data);$i++): ?>
    <li><?= $data[$i]["Text"] ?>
        <a href="<?=PROJROOT?>del?id=<?= $data[$i]["id"] ?>" class="del"></a>
    </li>
    <? endfor; ?>
    </ul>
</div>
<script src="<?=JS.$js.".js"?>"></script>
</body>
</html>