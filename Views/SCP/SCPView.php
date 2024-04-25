<link rel="stylesheet" href="Css/Personnel/scpView.css">

<div class="scpview__flex">
    <div class="scp_left">
        <h1 class="scp_name"><?=$scp->SCPMatricule?></h1>
        <h2 class="scp_class">Classe: <a><?=ucfirst($scp->SCPClass)?></a></h2>
        <h2>Procédure de Confinement:</h3>
        <p> <?=$scp->SCPContainement?></p>
        <h2>Description de <?=$scp->SCPMatricule?>:</h3>
        <p> <?=$scp->SCPDescription?></p>
    </div>
    <div class="scp_right">
        <img src="Assets/Pictures/SCP/<?= $scp->SCPImage ?>" alt="">
    </div>
</div>