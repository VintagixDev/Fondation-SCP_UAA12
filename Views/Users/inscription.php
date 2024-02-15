
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
                    <input type="text" placeholder="Nom" class="form-control" id="nom" name="nom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->nomUser ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="Prenom" class="form-label">Prénom</label>
                    <input type="text" placeholder="Prénom" class="form-control" id="prenom" name="prenom" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->prenomUser ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <input type="text" placeholder="description" class="form-control" id="description" name="description" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->emailUser ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">gender</label>
                    <input type="checkbox" placeholder="gender" class="form-control" id="gender" name="gender" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->loginUser ?>" <?php endif ?>>
                </div>
                <div class="mb-3">
                    <label for="rank" class="form-label">Rank</label>
                    <input type="text" placeholder="rank" class="form-control" id="rank" name="rank" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->passWordUser ?>" <?php endif ?>>
                </div>
                
                <div class="mb-3">
                    <label for="birthdate" class="form-label">birth</label>
                    <input type="date" placeholder="date" class="form-control" id="birthdate" name="birthdate" required <?php if (isset($_SESSION['user'])) : ?>value="<?= $_SESSION['user']->passWordUser ?>" <?php endif ?>>
                </div>
                <div>
                    <button name="btnEnvoi" class="btn btn-primary" value="submit">Envoyer</button>
                </div>
            </fieldset>
        </form>
        </div>
    </main>
