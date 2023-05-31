<?php 
include ('eleve.php');
$bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
if(isset($_GET['id'])){
    $eleve = eleve::getEleveById($_GET['id']);
    if($eleve){
        //Vérifie que le formulare a été soumis
        $eleve->deleteEleve();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>
<body>
    <h1> Suppression de <?php echo $eleve->getNom().' '.$eleve->getPrenom(); ?> </h1>
    <a href="index.php">Retour à la liste des élèves</a>


</body>
</html>