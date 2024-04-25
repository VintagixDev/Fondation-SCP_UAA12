
    <main>
        <div class="flex space-evenly wrap">
        <form method="post" action="">
            <fieldset>
                <legend>
                    <?php if(isset($_SESSION['user'])) :?>
                    Modifier le Profil
                    <?php else : ?>
                        Inscription
                    <?php endif?>
                    </legend>
                <div class="mb-3">
                    <label for="Nom" class="form-label">Nom</label>
                    <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->userLastName ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="Prenom" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="prenom" name="prenom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->userFirstName ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" placeholder="Email@SCP-Corp.com" class="form-control" id="email" name="email" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->userEmail ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" placeholder="Mot de passe..." class="form-control" id="password" name="password" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->userPassword ?>" <?php endif ?>>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
