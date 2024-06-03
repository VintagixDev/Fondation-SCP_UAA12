<?php if(isset($_GET["siteID"]) && ($uri === "/siteUpdate?siteID=" . $_GET["siteID"])){
    $update = true;
    $site = selectSiteByID($pdo, $_GET["siteID"]);
} else{
    $update = false;
}
?>
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                <?php if($update) :?>
                        Modifier un Site
                    <?php else : ?>
                        Ajouter une Site
                    <?php endif?>
                    </legend>
                <div class="mb-3">
                    <label for="site_nom" class="form-label">Identifiant</label>
                    <input type="text" placeholder="Site XX" class="form-control" id="site_nom" name="site_nom" <?php if($update) :?> value="<?=$site->siteName?>" <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="site_pays" class="form-label">Pays</label>
                    <input type="text" placeholder="Localisation du site" class="form-control" id="site_pays" name="site_pays" <?php if($update) :?> value="<?=$site->siteCountry?>" <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="site_description" class="form-label">Description</label>
                    <input type="text" placeholder="Description du Site" class="form-control" id="site_description" name="site_description" <?php if($update) :?> value="<?=$site->siteDescription ?>" <?php endif?>required>
                </div>
                <?php if(!$update) : ?>
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg"required>
                </div>
                <?php endif ?>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
