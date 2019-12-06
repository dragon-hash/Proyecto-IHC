<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
    
<?= $this->Form->create($car); ?>
<fieldset>
    <legend><?= __('Add Car') ?></legend>
    <?php
    echo $this->Form->control('license');
    if($current_user['role'] === 'Administrador'){
        echo $this->Form->control('user_id', ['options' => $users]);
	echo $this->Form->control('mechanics._ids', ['options' => $mechanics]);
    }
    echo $this->Form->control('maker');
    echo $this->Form->control('colour');
    //
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("add")?></button>
</div>
<?= $this->Form->end() ?>
