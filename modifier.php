<?php 
include ('eleve.php');
$bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
if(isset($_GET['id'])){
    $eleve = eleve::getEleveById($_GET['id']);
    if($eleve){
        //Vérifie que le formulare a été soumis
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newNom= $_POST['nom'];
        $newPrenom= $_POST['prenom'];
        eleve::updateEleveById(new eleve($_GET['id'], $newNom, $newPrenom, $eleve->getDate_de_naissance()));
        header('Location: index.php');
        exit;
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1> Modification de <?php echo $eleve->getNom(); ?> </h1>
    <form method="POST" >
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" value="<?php echo $eleve->getNom(); ?>">
        <br>
        <label for="prenom">Prenom : </label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $eleve->getPrenom(); ?>">
        <br>
    

        <input type="submit" value="Modifier" id="modifier" >


    </form>


</body>
</html>