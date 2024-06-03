<?php if(isset($_GET["SCPID"]) && ($uri === "/SCPUpdate?SCPID=" . $_GET["SCPID"])){
    $update = true;
    $scp = selectSCPFromID($pdo, $_GET["SCPID"]);

} else{
    $update = false;
}
?>
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un SCP
                    </legend>
                <div class="mb-3">
                    <label for="matricule" class="form-label">Matricule</label>
                    <input type="text" placeholder="SCP-XXX" class="form-control" id="matricule" name="matricule" <?php if($update) :?> value="<?=$scp->SCPMatricule?>" <?php endif ?> required>
                </div>
                <div>
                    <select name="classe" id="options-select">
        
                            <option value="safe" <?php if($update && $scp->SCPClass === "safe") : ?> selected <?php endif?>>Safe</option>
                            <option value="euclide"  <?php if($update && $scp->SCPClass === "euclide") : ?> selected <?php endif?>>Euclide</option>
                            <option value="keter"  <?php if($update && $scp->SCPClass === "keter") : ?> selected <?php endif?>>Keter</option>
                        
                </div>
                <div class="mb-3">
                    <label for="containment" class="form-label">Confinement</label>
                    <input type="text" placeholder="Description du confinement" class="form-control" id="containment" name="containment" <?php if($update) :?> value="<?=$scp->SCPContainement?>" <?php endif ?> required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" placeholder="Description du SCP" class="form-control" id="description" name="description" <?php if($update) :?> value="<?=$scp->SCPDescription?>" <?php endif ?> required>
                </div>
                <div>
                    <select name="site" id="options-select">
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg" <?php if(!$update) :?> required <?php endif?>>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
