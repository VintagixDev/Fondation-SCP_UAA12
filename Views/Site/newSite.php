
<main>
        <div class="flex space-evenly wrap">
        <form method="post" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>

                        Ajouter un Site
                    </legend>
                <div class="mb-3">
                    <label for="site_nom" class="form-label">Identifiant</label>
                    <input type="text" placeholder="Site XX" class="form-control" id="site_nom" name="site_nom" required>
                </div>
                <div class="mb-3">
                    <label for="site_pays" class="form-label">Pays</label>
                    <input type="text" placeholder="Localisation du site" class="form-control" id="site_pays" name="site_pays" required>
                </div>
                <div class="mb-3">
                    <label for="site_description" class="form-label">Description</label>
                    <input type="text" placeholder="Description du Site" class="form-control" id="site_description" name="site_description" required>
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
