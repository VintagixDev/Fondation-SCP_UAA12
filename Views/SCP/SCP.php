<link rel="stylesheet" href="Css/Personnel/scpList.css">


<h1 class="scp__title">Liste des SCP</h1>
<div class="scpContainer">
    
    
    <div class="scp__safe_list">
        <h2 class="scp__className">Safe:</h2>

        <?php foreach($safe as $scp) :?>
            
            <div class="scp__card">
                <div>
                    <img src="Assets/Pictures/SCP/<?=$scp->SCPImage?>" alt="">
                </div>
                <div class="scp__card_right">

                    <h1><?= $scp->SCPMatricule ?></h1>
                    <p>Classe: <?= $scp->SCPClass ?></p>
                    <button class="card_button" onclick="location.href = 'scpView?SCPID=<?= $scp->SCPID?>'">
                        <span>Consulter</span>
                    </button>
                </div>
                
                
            </div>
            <?php endforeach?>
        </div>

        
        <div class="scp__euclide_list">
            
            <h2>Euclide</h2>
        <?php foreach($euclide as $scp) :?>
            
            <div class="scp__card">
                <div>
                    <img src="Assets/Pictures/SCP/<?=$scp->SCPImage?>" alt="">
                </div>
                <div class="scp__card_right">

                    <h1><?= $scp->SCPMatricule ?></h1>
                    <p>Classe: <?= $scp->SCPClass ?></p>
                    <button class="card_button" onclick="location.href = 'scpView?SCPID=<?= $scp->SCPID?>'">
                        <span>Consulter</span>
                    </button>
                </div>
                
                
            </div>
            <?php endforeach?>
    </div>
            
    
    <div class="scp__keter_list">
        <h2>Keter</h2>
        <?php foreach($keter as $scp) :?>
            <div class="scp__card">
                <div>
                    <img src="Assets/Pictures/SCP/<?=$scp->SCPImage?>" alt="">
                </div>

                <div class="scp__card_right">

                    <h1><?= $scp->SCPMatricule ?></h1>
                    <p>Classe: <?= $scp->SCPClass ?></p>
                    <button class="card_button" onclick="location.href = 'scpView?SCPID=<?= $scp->SCPID?>'">
                        <span>Consulter</span>
                    </button>
                </div>
                
                
            </div>

            <?php endforeach?>
    </div>
            
</div>