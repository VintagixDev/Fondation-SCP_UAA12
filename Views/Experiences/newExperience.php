<?php if(isset($_GET["experienceID"]) && ($uri === "/experienceUpdate?experienceID=" . $_GET["experienceID"])){
    $update = true;
    $experience = selectExperienceFromID($pdo, $_GET["experienceID"]);
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
                        Modifier une Expérience
                    <?php else : ?>
                        Ajouter une Expérience
                    <?php endif?>
                    </legend>
                    <div class="mb-3">
                        <label for="experienceNote" class="form-label">Nom de l'expérience</label>
                        <input type="text" placeholder="Nom de l'expérience" class="form-control" id="experienceNote" name="experienceNote" <?php if($update) :?> value="<?=$experience->experienceTitre?>" <?php endif?> required>
                    </div>
                <div class="mb-3">
                    <label for="experienceDate" class="form-label">Date de l'expérience</label>
                    <input type="date" class="form-control" id="experienceDate" name="experienceDate" <?php if($update) :?> value="<?=$experience->experienceDate?>" <?php endif?> required>
                </div>
                <div class="mb-3">
                    <label for="experienceDescription" class="form-label">Description</label>
                    <input type="text" placeholder="Description" class="form-control" id="experienceDescription" name="experienceDescription" <?php if($update) :?> value="<?=$experience->experienceDescription?>" <?php endif?> required>
                </div>

                <div style="margin-top: 15px;">
                    <label for="classD">SCP:</label>
                    <br>
                    <select name="SCPID" id="options-select" style="width: 250px;">
                        <?php foreach ($scps as $scp) : ?>
                            <option value="<?= $scp->SCPID ?>"><?=$scp->SCPMatricule?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                <div>
                
                <div style="margin-top: 15px;">
                    <label for="classD">Classe D:</label>
                    <br>
                    <select name="classDID" id="options-select" style="width: 250px;">
                        <?php foreach ($classesD as $classD) : ?>
                            <option value="<?= $classD->classDID ?>"><?=$classD->classDMatricule?> (<?=$classD->classDFirstName?> <?=$classD->classDName?>)</option>
                        <?php endforeach ?>
                    </select>
                    </div>
                <div>

                <div style="margin-top: 15px;">
                    <label for="classD">Scientifique:</label>
                    <br>
                    <select name="scientistID" id="options-select" style="width: 250px;">
                        <?php foreach ($scientists as $scientist) : ?>
                            <option value="<?= $scientist->scientistID ?>"><?=$scientist->scientistFirstName?> <?= $scientist->scientistName?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                <div>

                <div style="margin-top: 15px;">
                    <label for="classD">Garde:</label>
                    <br>
                    <select name="guardID" id="options-select" style="width: 250px;">
                        <?php foreach ($guards as $guard) : ?>
                            <option value="<?= $guard->GuardID ?>"><?=$guard->GuardFirstName?> <?= $guard->GuardName?></option>
                        <?php endforeach ?>
                    </select>
                    </div>
                <div>
                
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
