
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un SCP
                    </legend>
                <div class="mb-3">
                    <label for="matricule" class="form-label">Matricule</label>
                    <input type="text" placeholder="SCP-XXX" class="form-control" id="matricule" name="matricule" required>
                </div>
                <div>
                    <select name="classe" id="options-select" multiple>
        
                            <option value="safe" selected>Safe</option>
                            <option value="euclide">Euclide</option>
                            <option value="keter">Keter</option>
                        
                </div>
                <div class="mb-3">
                    <label for="containment" class="form-label">Confinement</label>
                    <input type="text" placeholder="Description du confinement" class="form-control" id="containment" name="containment" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" placeholder="Description du SCP" class="form-control" id="description" name="description" required>
                </div>
                <div>
                    <select name="site" id="options-select" multiple>
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                
                <div class="mb-3">
                    <label for="profile_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/jpeg" required>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
