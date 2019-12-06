<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
   
<?= $this->Form->create($service); ?>
<fieldset>
    <legend><?= __('Edit Service') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("save")?></button>
</div>
<?= $this->Form->end() ?>
