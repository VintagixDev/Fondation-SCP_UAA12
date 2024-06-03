<link rel="stylesheet" href="Css/User/profil.css">

<div class="profil">

    <h1>Profil</h1>
    
    <div class="profile-container">
        <div class="profile-item">
            <p class="profile-label">Nom:</p>
            <p class="profile-data"><?=$_SESSION['user']->userFirstName ?></p>
        </div>
        <div class="profile-item">
            <p class="profile-label">Numéro de Téléphone:</p>
            <p class="profile-data"><?=$_SESSION['user']->userLastName ?></p>
        </div>
        <div class="profile-item">
            <p class="profile-label">Email:</p>
            <p class="profile-data"><?=$_SESSION['user']->userEmail ?></p>
        </div>
        <div class="profile-item">
            <p class="profile-label">Mot de Passe:</p>
            <p class="profile-data"><?=$_SESSION['user']->userPassword ?></p>
        </div>
    </div>

    <div class="buttons">

        
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="modifier2">
                <a class="modifier" href="/updateProfil">modifier</a>
            </div>
        <?php endif ?>
        
        <?php if (isset($_SESSION['user'])) : ?>
            <div class="modifier2">
               <a class="modifier" href="/deleteProfil">supprimer votre compte</a>
            </div>
        <?php endif ?>
    </div>
</div>