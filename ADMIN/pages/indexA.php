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
        if(!isset($_SESSION['id'])){
    
    require_once 'navbar.php';
    ?>

    <?php }else{ 
        require_once 'navbarA.php';

   } ?>
<div class="container mt-5">
    <h1>Bonjour <?php echo $_SESSION['nom_utilisateur']; ?></h1>
<h2>Liste d'annonces non approuvées</h2>
<br>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Vendeur</th>
                <th>Numero de telephone</th>
                <th>Titre du produit</th>
                <th>État</th>
                <th>Description du produit</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody id="taskTableBody">
        <?php
            include_once '../include/afficher_ann_A.php';
            $annonces = get_annonces_par_statut($link, 'refuse');
            foreach ($annonces as $annonce) {
        ?>
            <tr>
                <td><?php echo $annonce['nom_utilisateur'] ;?></td>
                <td><?php echo $annonce['numero_tel'] ;?> </td>
                <td><?php echo $annonce['titre_annonce'] ;?> </td>
                <td><?php echo $annonce['etat_annonce'] ;?> </td>
                <td><?php echo $annonce['description_annonce'] ;?> </td>
                <td><form action="../include/refuse.php" method="get" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $annonce['id']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Refuser
                    </button>
                </form>
            </td>
            <td><form action="../include/approuve.php" method="get" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $annonce['id']; ?>">
                    <button class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Approuver
                    </button>
                </form>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


    <h2>Liste d'annonces approuvées</h2>
    
    <br>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Vendeur</th>
                <th>Numero de telephone</th>
                <th>Titre du produit</th>
                <th>État</th>
                <th>Description du produit</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody id="taskTableBody">
        <?php
            include_once '../include/afficher_ann_A.php';
            $annonces_approuve = get_annonces_par_statut($link, 'approuve');
            foreach ($annonces_approuve as $annonce) {
        ?>
            <tr>
                <td><?php echo $annonce['nom_utilisateur'] ;?></td>
                <td><?php echo $annonce['numero_tel'] ;?> </td>
                <td><?php echo $annonce['titre_annonce'] ;?> </td>
                <td><?php echo $annonce['etat_annonce'] ;?> </td>
                <td><?php echo $annonce['description_annonce'] ;?> </td>
                <td><form action="../include/deleteA.php" method="get" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $annonce['id']; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!--  -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
