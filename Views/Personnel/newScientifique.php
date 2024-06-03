<?php if(isset($_GET["scientistID"]) && ($uri === "/scientifiqueUpdate?scientistID=" . $_GET["scientistID"])){
    $update = true;
    $scientist = selectScientistByID($pdo, $_GET["scientistID"]);
} else{
    $update = false;
}
?>
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un Scientifique
                    </legend>
                <div class="mb-3">
                    <label for="scientistName" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="scientistName" name="scientistName" <?php if($update) :?> value=<?=$scientist->scientistName?> <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="scientistLastName" class="form-label">Nom de famille</label>
                    <input type="text" placeholder="Nom de famille" class="form-control" id="scientistLastName" name="scientistLastName" <?php if($update) :?> value=<?=$scientist->scientistFirstName?> <?php endif ?> required>
                </div>
                <div class="mb-3">
                    <label for="scientistDescription" class="form-label">Description</label>
                    <input type="text" placeholder="Description" class="form-control" id="scientistDescription" name="scientistDescription" <?php if($update) :?> value=<?=$scientist->scientistDescription?> <?php endif ?> required>
                </div>

                <div>
                    <select name="site" id="options-select">
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                
                <div class="mb-3">
                    <label for="scientistRank" class="form-label">Rang</label>
                    <input type="text" placeholder="Rang" class="form-control" id="scientistRank" maxlength=15 name="scientistRank" <?php if($update) :?> value=<?=$scientist->scientistRank ?> <?php endif ?> required>
                </div>

                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg" <?php if(!$update) :?> required <?php endif ?> >
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
