<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<?= $this->Form->create($role); ?>
<fieldset>
    <legend><?= __('Edit Role') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('status');
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("save")?></button>
</div>
<?= $this->Form->end() ?>
