<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Replacement $replacement
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
   
<?= $this->Form->create($replacement); ?>
<fieldset>
    <legend><?= __('Edit Replacement') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->control('category_id', ['options' => $categories]);
    echo $this->Form->control('unit_price');
    echo $this->Form->control('quantity');
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("save")?></button>
</div>
<?= $this->Form->end() ?>
