<link rel="stylesheet" href="Css/experienceView.css">
<div class="experience">

    <div class="left">

        <h1 style="text-decoration: underline; font-size: 2.3rem;" ><?=$experience->experienceTitre?></h1>
        <h1 style="text-decoration: underline"><?=$scp->SCPMatricule?></h1>
        <h2>Date:</h2> <p style="text-decoration: underline"><?=$experience->experienceDate?></p>
        
        
        <h1 style="text-decoration: underline">Personnel impliqué:</h1>
        <h2>Classe D:</h2><p><?=$classD->classDMatricule?>
        <h2>Scientifique:</h2><p><?=$scientist->scientistFirstName?> <?=$scientist->scientistName?>
        <h2>Garde:</h2><p><?=$guard->GuardFirstName?> <?=$guard->GuardName?></p>


        <h1 style="text-decoration: underline">Description:</h1>
        <p><?=$experience->experienceDescription?></p>
    </div>


    <div class="right">
        <img src="Assets/Pictures/SCP/<?=$scp->SCPImage?>" alt="">
    </div>

</div>