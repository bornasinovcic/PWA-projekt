<?php
    $category = $_POST['category']
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section role="main">
        <div class="row">
            <p class="category">
                <?php
                    echo $category;
                ?>
            </p>
        </div>
    </section>
</body>
</html>