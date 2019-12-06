<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<?= $this->Form->create($user,['type'=>'file' ]); ?>
<fieldset>
    <legend><?= __('Add User') ?></legend>
    <?php
    echo $this->Form->control('role_id', ['options' => $roles]);
    echo $this->Form->control('name');
    echo $this->Form->control('surname');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('photo',['type' => 'file']);
    echo $this->Form->control('address');
    echo $this->Form->control('phone');
    echo $this->Form->control('status');
    ?>
</fieldset>
<div class="center">
<button type="submit" class="boton_personalizado"><?= __("add")?></button>
</div>
<?= $this->Form->end() ?>
