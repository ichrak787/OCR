<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Employés</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
body {
 
}

.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
}
</style>
<body>
    <div class="container">
        <a href="ajouter.php" class="Btn_add"> <img src="images/Pluss.png"  width="10" height="20"> Ajouter</a>
        
        <table>
            <tr id="items">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Age</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion3.php";
                //requête pour afficher la liste des employés
                $req = mysqli_query($con , "SELECT * FROM employe");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas d'employé dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore d'employé ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les employés
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['age']?></td>
                            <!--Nous alons mettre l'id de chaque employé dans ce lien -->
                            <td><a href="modifier.php?id=<?=$row['id']?>"><img src="images/pen.png"     width="40" height="50"></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><img src="images/trash.png"  width="40" height="50"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
        <a href="land.php" class="Btn_add"> <img src="images/back.png"  width="10" height="20"> Retour </a>
   
   
   
    </div>
</body>
</html>