<?php
session_start();


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Avito</title>
</head>

<body>

    <?php 
    require_once 'navbar.php';
    ?>
        <div class="container mt-5">
            <h1>Bonjour <?php echo $_SESSION['nom_utilisateur']; ?></h1>
            <img src="<?php echo  " ../include/uploads/" . $_SESSION['photo'] ?>" alt="Photo de profil" width="150">
            

            


        </div>
<!--  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>