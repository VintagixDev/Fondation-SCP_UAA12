<?php if(isset($_GET["GuardID"]) && ($uri === "/guardUpdate?GuardID=" . $_GET["GuardID"])){
    $update = true;
    $guard = selectGuardByID($pdo, $_GET["GuardID"]);

} else{
    $update = false;
}
?>
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un Garde
                    </legend>
                <div class="mb-3">
                    <label for="GuardName" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="GuardName" name="GuardName" <?php if($update) :?>  value="<?=$guard->GuardFirstName?>" <?php endif ?> required>
                </div>
                <div class="mb-3">
                    <label for="GuardLastName" class="form-label">Nom de famille</label>
                    <input type="text" placeholder="Nom de famille" class="form-control" id="GuardLastName" name="GuardLastName" <?php if($update) :?>  value="<?=$guard->GuardName?>" <?php endif ?> required>
                </div>
                <div class="mb-3">
                    <label for="GuardDescription" class="form-label">Description</label>
                    <input type="text" placeholder="Description" class="form-control" id="GuardDescription" name="GuardDescription" <?php if($update) :?>  value="<?=$guard->GuardDescription?>" <?php endif ?> required>
                </div>

                <div>
                    <select name="site" id="options-select">
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                
                <div class="mb-3">
                    <label for="GuardRank" class="form-label">Rang</label>
                    <input type="text" placeholder="Rang" class="form-control" id="GuardRank" maxlength=15 name="GuardRank" <?php if($update) :?>  value="<?=$guard->GuardRank?>" <?php endif ?> required>
                </div>

                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg" <?php if(!$update) : ?> required <?php endif?>>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
