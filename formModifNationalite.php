<?php 
include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];
$req=$monPdo->prepare("select * from nationalite where num= :num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':num', $num);
$req->execute();
$laNationalite=$req->fetch();
var_dump($laNationalite);
?>


    <div class="container mt-5">
        <h2 class="pt-4 text-center">Modifier une nationalité</h2>
        <form action="valideModifNationalite.php" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for="libelle"> Libellé </label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $laNationalite->libelle; ?>">
            </div>
            <input type="hidden" id="num"name="num" value="<?php echo $laNationalite->num ?>">
            <div class="row">
                <div class="col"> <a href="listeNationalites.php" class="btn btn-primary btn-block">Revenir a la liste</a> </div>
                <div class="col"><button type="submit"class="btn btn-success btn-block" >Modifier</button></div>
            </div>
        </form>
    </div>

<?php include "footer.php"?>