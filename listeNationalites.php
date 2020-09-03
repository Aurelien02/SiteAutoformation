<?php 
include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>


    <div class="container mt-5">

        <div class="row pt-4">
        <div class="col-9"><h2>Liste des nationalités</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class="btn btn-success ">Créer une nationalité</a></div>
            
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="d-flex">
                        <th scope="col" class="col-md-2">numéro</th>
                        <th scope="col" class="col-md-8">Libellé</th>
                        <th scope="col" class="col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach($lesNationalites as $nationalite){
                    echo "<tr class='d-flex'>";
                        echo "<td class='col-md-2'>$nationalite->num</td>";
                        echo "<td class='col-md-8'>$nationalite->libelle</td>";
                        echo "<td class='col-md-2'>
                        <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-info'><i class='fas fa-pen'></i></a>
                        <a href='' class='btn btn-primary'><i class='far fa-trash-alt'></i></a>
                        </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include "footer.php"?>
