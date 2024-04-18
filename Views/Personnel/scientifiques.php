<link rel="stylesheet" href="Css/Personnel/scientifiques.css">

<div class="scientist__card_container">
    <?php foreach($scientists as $scientist) :?>
        <div class="scientist__card">
    
            <img src="<?=$scientist->scientistImg?>" alt="" class="scientist__img">
            <p class="scientist__firstName">Prénom: <?= $scientist->scientistFirstName ?></h1>
            <p class="scientist__name">Nom: <?= $scientist->scientistName ?></p>
            <p class="scientist__description">Description: <?= $scientist->scientistDescription?></p>
            <p class="scientist__rank">Rang: <?=$scientist->scientistRank?></p>
        </div>
    <?php endforeach?>

</div>
