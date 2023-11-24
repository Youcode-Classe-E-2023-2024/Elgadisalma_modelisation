<?php
require_once 'config.php';

if (isset($_GET['id'])) {
    $annonce_id = $_GET['id'];

    $sql = "UPDATE annonce SET statut = 'approuve' WHERE id = ?";
    $stmt = $link->prepare($sql);

    $stmt->bind_param("i", $annonce_id); 

    if ($stmt->execute()) {
        header("location: ../pages/indexA.php?STATUS=annonce approuve avec succes");
    } else {
        echo "Erreur lors de l'approuvement de l'annonce : " . $stmt->error;
    }

    $stmt->close();
} 

?>
