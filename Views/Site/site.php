<link rel="stylesheet" href="Css/site.css">

<h1 class="site__title">Fiche du <?=$site->siteName?></h1>
<div class="site">
    <div class="left">

        <h1 class="site__name"><?=$site->siteName?></h1>
        <h2 class="site__location">Lieu: <?=$site->siteCountry?></h2>
        <h2>Description:</h2>
        <p><?=$site->siteDescription?> </p>
    </div>
    <img src="Assets/Pictures/Sites/<?=$site->siteImg?>" alt="">
</div>