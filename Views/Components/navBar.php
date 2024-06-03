<div class="header">
    <a href="/"><img src="Img/logo.png" alt="logo SCP"></a>
    <div class="header__flex">

        <div class="left">
            <li><a href="/">Accueil</a></li>
            <li><a href="/scp">SCP</a></li>
            <div class="nav__personnel">
                
                <img src="https://img.icons8.com/ios-filled/50/expand-arrow--v1.png" alt="expand-arrow--v1"/>
                <li class="sublist">Personnel
                    <ul class="nested-list">
                        <li><a href="classeD">Classe D</a></li>
                        <li><a href="scientifique">Scientifiques</a></li>
                        <li><a href="garde">Gardes</a></li>
                </ul>
                </li>
            </div>
            <li><a href="experiences">Expériences</a></li>
        </div>
        
        <div class="right">
            <?php if(isset($_SESSION["user"])) :?>
                    <li><a href="profil">Profil</a></li>
                    <li><a href="deconnexion">Déconnexion</a></li>
               
            <?php else :?>
                <li><a href="connexion">Connexion</a></li>
                <li><a href="inscription">Inscription</a></li>
            <?php endif?>
        </div>
    </div>
</div>