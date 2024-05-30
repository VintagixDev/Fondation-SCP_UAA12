
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un Scientifique
                    </legend>
                <div class="mb-3">
                    <label for="scientistName" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="scientistName" name="scientistName" required>
                </div>
                <div class="mb-3">
                    <label for="scientistLastName" class="form-label">Nom de famille</label>
                    <input type="text" placeholder="Nom de famille" class="form-control" id="scientistLastName" name="scientistLastName" required>
                </div>
                <div class="mb-3">
                    <label for="scientistDescription" class="form-label">Description</label>
                    <input type="text" placeholder="Description" class="form-control" id="scientistDescription" name="scientistDescription" required>
                </div>

                <div>
                    <select name="site" id="options-select">
                        <?php foreach ($sites as $site) : ?>
                            <option value="<?= $site->siteID ?>"><?=$site->siteName?></option>
                        <?php endforeach ?>
                </div>
                
                <div class="mb-3">
                    <label for="scientistRank" class="form-label">Rang</label>
                    <input type="text" placeholder="Rang" class="form-control" id="scientistRank" name="scientistRank" required>
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
