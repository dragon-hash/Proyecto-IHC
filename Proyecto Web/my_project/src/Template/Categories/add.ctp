<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
    
<?= $this->Form->create($category); ?>
<fieldset>
    <legend><?= __('Add Category') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("add")?></button>
</div>
<?= $this->Form->end() ?>
