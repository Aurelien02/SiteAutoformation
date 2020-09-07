<?php 
include "header.php";
include "connexionPdo.php";

$action=$_GET['action'];// soit ajouter soit modifier
if($action == "Modifier"){
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from nationalite where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $laNationalite=$req->fetch();
    
}
    //liste des continents
    $reqContinent=$monPdo->prepare("select * from continent");
    $reqContinent->setFetchMode(PDO::FETCH_OBJ);
    $reqContinent->execute();
    $lesContinents=$reqContinent->fetchAll();
?>


    <div class="container mt-5">
        <h2 class="pt-4 text-center pt-5"><?php echo $action ?> une nationalité</h2>
        <form action="valideFormNationalite.php?action=<?php echo $action ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
            <div class="form-group">
                <label for="Pays">  <?php if($action == "Ajouter") {echo "Libellé";}?> </label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?php if($action == "Modifier") {echo $laNationalite->libelle;} ?>">
            </div>
            <div class="form-group">
                <label for="Continent">  <?php if($action == "Ajouter") {echo "Libellé";}?> </label>
                <select name="continent" class="form-control">
                    <?php
                    foreach($lesContinents as $continent){
                        $selection=$continent->num == $laNationalite->numContinent ? 'selected' : '';
                        echo "<option value='$continent->num' $selection>$continent->libelle</option>";
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" id="num"name="num" value="<?php if($action == "Modifier") {echo $laNationalite->num;} ?>">
            <div class="row">
                <div class="col"> <a href="listeNationalites.php" class="btn btn-primary btn-block">Revenir a la liste</a> </div>
                <div class="col"><button type="submit"class="btn btn-success btn-block" ><?php echo $action ?></button></div>
            </div>
        </form>
    </div>

<?php include "footer.php"?>
