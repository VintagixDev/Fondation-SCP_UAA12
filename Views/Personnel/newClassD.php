<?php if(isset($_GET["classDID"]) && ($uri === "/classDUpdate?classDID=" . $_GET["classDID"])){
    $update = true;
    $classD = selectClassDByID($pdo, $_GET["classDID"]);

} else{
    $update = false;
}
?>
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter une Classe D
                    </legend>
                <div class="mb-3">
                    <label for="classDFirstName" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="classDFirstName" name="classDFirstName" <?php if($update) :?> value="<?=$classD->classDFirstName?>" <?php endif?>required>
                </div>
                <div class="mb-3">
                    <label for="classDName" class="form-label">Nom de famille</label>
                    <input type="text" placeholder="Nom de famille" class="form-control" id="classDName" name="classDName" <?php if($update) :?> value="<?=$classD->classDName?>" <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="classDMatricule" class="form-label">Matricule</label>
                    <input type="number" placeholder="XXXXX" class="form-control" id="classDMatricule" name="classDMatricule" <?php if($update) :?> value="<?=$classD->classDMatricule?>" <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="classDMentalIssues" class="form-label">Problèmes Mentaux</label>
                    <input type="text" placeholder="Problèmes Mentaux" class="form-control" id="classDMentalIssues" name="classDMentalIssues" <?php if($update) :?> value="<?=$classD->classDMentalIssues?>" <?php endif?>required>
                </div>

                
                <div class="mb-3">
                    <label for="classDEthnic" class="form-label">Ethnie</label>
                    <input type="text" placeholder="Ethnie" class="form-control" id="classDEthnic" name="classDEthnic" <?php if($update) :?> value="<?=$classD->classDEthnic?>" <?php endif?>required>
                </div>
                
                <div>
                    <select name="site" id="options-select">
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                <div>
              
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg" <?php if(!$update) :?> required <?php endif?>>
                </div>
                
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
