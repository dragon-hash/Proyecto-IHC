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
    <legend><?= __('Edit Car') ?></legend>
    <?php
    echo $this->Form->control('license');
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('maker');
    echo $this->Form->control('colour');
    echo $this->Form->control('mechanics._ids', ['options' => $mechanics]);
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("save")?></button>
</div>
<?= $this->Form->end() ?>
