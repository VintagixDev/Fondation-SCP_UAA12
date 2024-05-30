<link rel="stylesheet" href="Css/Personnel/gardes.css">

<?php if(isset($_SESSION["user"])) : ?>
    <?php if($_SESSION["user"]->userPermission === "admin") :?>
        <button class="addGuard" onclick="location.href = 'newClasseD'">Ajouter une classe D</button>

    <?php endif?>
<?php endif?>

<div class="guard__card_container">
    <?php foreach($classesD as $classD) :?>
        <div class="guard__card">
    
            <img src="Assets/Pictures/ClasseD/<?=$classD->classDImg?>" alt="" class="guard__img">
    <p class="scientist__firstName">Prénom: <?= $classD->classDFirstName ?></h1>
            <p class="scientist__name">Nom: <?= $classD->classDName ?></p>
            <p class="scientist__description">Matricule: <?= $classD->classDMatricule?></p>
            <p class="scientist__description">Ethnie: <?= $classD->classDEthnic?></p>
            <p class="scientist__rank">Problème(s) Mentaux: <?=$classD->classDMentalIssues?></p>
            <div class="card_buttons">
                
            <?php if(isset($_SESSION["user"])) :?>
                   <?php if($_SESSION["user"]->userPermission === "admin") :?>
                        <button class="card_delete" onclick="location.href = 'classeDDelete?classDID=<?= $classD->classDID?>'"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 50 50">
                        <path d="M 42 5 L 32 5 L 32 3 C 32 1.347656 30.652344 0 29 0 L 21 0 C 19.347656 0 18 1.347656 18 3 L 18 5 L 8 5 C 7.449219 5 7 5.449219 7 6 C 7 6.550781 7.449219 7 8 7 L 9.085938 7 L 12.695313 47.515625 C 12.820313 48.90625 14.003906 50 15.390625 50 L 34.605469 50 C 35.992188 50 37.175781 48.90625 37.300781 47.515625 L 40.914063 7 L 42 7 C 42.554688 7 43 6.550781 43 6 C 43 5.449219 42.554688 5 42 5 Z M 20 44 C 20 44.554688 19.550781 45 19 45 C 18.449219 45 18 44.554688 18 44 L 18 11 C 18 10.449219 18.449219 10 19 10 C 19.550781 10 20 10.449219 20 11 Z M 20 3 C 20 2.449219 20.449219 2 21 2 L 29 2 C 29.550781 2 30 2.449219 30 3 L 30 5 L 20 5 Z M 26 44 C 26 44.554688 25.550781 45 25 45 C 24.449219 45 24 44.554688 24 44 L 24 11 C 24 10.449219 24.449219 10 25 10 C 25.550781 10 26 10.449219 26 11 Z M 32 44 C 32 44.554688 31.554688 45 31 45 C 30.445313 45 30 44.554688 30 44 L 30 11 C 30 10.449219 30.445313 10 31 10 C 31.554688 10 32 10.449219 32 11 Z"></path>
                        </svg></button>
                        <button class="card_edit" onclick="location.href = 'classeDEdit?classDID=<?= $classD->classDID?>'">
                        <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                    </button>
                   <?php endif?>
            <?php endif?>

            </div>
        </div>
    <?php endforeach?>

</div>
