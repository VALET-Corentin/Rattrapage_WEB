<?php
$this->_t = 'Projet web';
?>

<h2>Liste des pilotes :</h2>
<?php foreach($pilotes as $pilote): ?>
    <hr>
    <h4> <?= $pilote->lastName() ?></h4>
    <h4> <?= $pilote->firstName() ?></h4>
    <h4> <?= $pilote->id() ?></h4>

<?php endforeach; ?>