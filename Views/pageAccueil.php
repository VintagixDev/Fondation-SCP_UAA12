<?php if(isset($_SESSION['user'])) :?>
    <p>hey! <?= $_SESSION['user']->GuardName ?></p>
<?php endif?>
