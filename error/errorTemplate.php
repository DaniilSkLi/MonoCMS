<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MONO Core</title>
    </head>
    <body>
        <h1><?php echo $error ?></h1>
        <ul>
            <?php foreach ($solutions as $tip) { ?>
            <li><?php echo $tip; ?></li>
            <?php } ?>
        </ul>
        <h4>
            You can also post your issue in the <a href="<?php echo $info["github"] ?>">GitHub</a> "issues".
            <br><br>
            <?php echo $info["name"] . " " . $info["version"] . " by " ?>
            <a href="<?php echo $info["authorLink"] ?>"><?php echo $info["author"] ?></a>
            <br>
            <small><?php echo $info["year"] ?></small>
        </h4>
    </body>
</html>