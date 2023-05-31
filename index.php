<?php

    $bdd = new PDO('mysql:dbname=lycée;host=127.0.0.1','root', 'root');
    $queryExec = $bdd->query("SELECT * FROM eleve");
    $lesEleves = $queryExec->fetchAll();
   

    include('eleve.php');

    $tableauEleve= array();

    foreach ($lesEleves as $eleve) {
        // var_dump ($eleve['ID']);
        // var_dump ($eleve['nom']);
        // var_dump ($eleve['prenom']);
        // var_dump ($eleve['date_de_naissance']);

        $monEleve= new Eleve ($eleve['Id'],$eleve['nom'],$eleve['prenom'],$eleve['date_de_naissance']);

       array_push($tableauEleve,$monEleve);
    }

    //Vérifie que le formulare a été soumis
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $Nom= $_POST['nom'];
        $Prenom= $_POST['prenom'];
        $ddn = $_POST['ddn'];
        eleve::createEleve(new eleve(null, $Nom, $Prenom, $ddn));
        header('Location: index.php');
        exit;
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

<header>



</header>

<main>
<form method="post">
    <label for="nom">Nom : </label>
    <input type="text" id="nom" name="nom">
    <label for="prenom">Prenom : </label>
    <input type="text" id="prenom" name="prenom">
    <label for="prenom">Date de naissance : </label>
    <input type="text" id="ddn" name="ddn">
    <input type="submit" value="Inserer" id="inserer" >
</form>
<table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">datDeNaissance</th>
                <th scope="col">Modifier</th>
                <th scope="col">Supprimer</th> 

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesEleves as $unEleve) : ?>
                <?php $elv = new eleve($unEleve['Id'], $unEleve['nom'], $unEleve['prenom'], $unEleve['date_de_naissance']); ?>
                <tr>
                    <td scope="row"><?php echo $elv->getId(); ?></td>
                    <td><?php echo $elv->getNom(); ?></td>
                    <td><?php echo $elv->getPrenom(); ?></td>
                    <td><?php echo $elv->getDate_de_naissance(); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $elv->getId(); ?>">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </a>
                    </td>
                    <td>
                        <a href="supprimer.php?id=<?php echo $elv->getId(); ?>">
                            <i class="bi bi-pencil-square"></i> Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<main>

<footer>

</footer>
    
</body>
</html>