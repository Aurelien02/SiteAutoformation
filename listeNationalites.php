<?php 
include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();

if(!empty($_SESSION['message'])){
    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$mesage){
        echo '<div class="container pt-4">
                <div class="alert alert-'.$key.' alert-dismissible fade show mt-5" role="alert">'.$mesage
                    .'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
    }
    $_SESSION['message']=[];
}

?>
    <div class="container mt-5">

        <div class="row pt-4">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
            <div class="col-3"><a href="formNationalite.php?action=Ajouter" class="btn btn-success ">Créer une nationalité</a></div>
            
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="d-flex">
                            <th scope="col" class="col-md-2">numéro</th>
                            <th scope="col" class="col-md-5">Pays</th>
                            <th scope="col" class="col-md-3">Continent</th>
                            <th scope="col" class="col-md-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($lesNationalites as $nationalite){
                        echo "<tr class='d-flex'>";
                            echo "<td class='col-md-2'>$nationalite->num</td>";
                            echo "<td class='col-md-5'>$nationalite->libNation</td>";
                            echo "<td class='col-md-3'>$nationalite->libContinent</td>";
                            echo "<td class='col-md-2'>
                            <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen'></i></a>
                            <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous vraiment supprimer cette natinalité' data-suppression='supprimerNatinalite.php?num=$nationalite->num' class='btn btn-primary'><i class='far fa-trash-alt'></i></a>
                            </td>";
                        echo "</tr>";
                        //supprimerNatinalite.php?num=$nationalite->num
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            
    </div>

<?php include "footer.php"?>
