<?php foreach($scientists as $scientist) :?>
    
    <h1>Prénom: <?= $scientist->scientistFirstName ?></h1>
    <p>Nom: <?= $scientist->scientistName ?></p>
    <p>Description: <?= $scientist->scientistDescription?></p>
    <p>Rang: <?=$scientist->scientistRank?></p>
<?php endforeach?>
