<?php

include "config/Database.php";
include "config/HelperFunction.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Apotek Riga</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- SIDEBAR -->
        <?php include "menu.php"; ?>



        <!-- CONTENT -->
        <div class="flex-1 p-8">

            <?php include "content.php"; ?>

        </div>

    </div>

</body>
</html>