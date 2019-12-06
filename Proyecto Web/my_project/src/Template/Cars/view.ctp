<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($car->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('License') ?></td>
            <td><?= h($car->license) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Maker') ?></td>
            <td><?= h($car->maker) ?></td>
        </tr>
        <tr>
            <td><?= __('Colour') ?></td>
            <td><?= h($car->colour) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($car->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($car->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($car->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Mechanics') ?></h3>
    </div>
    <?php if (!empty($car->mechanics)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Surname') ?></th>
                <th><?= __('Service Id') ?></th>
                <th><?= __('Salary') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($car->mechanics as $mechanics): ?>
                <tr>
                    <td><?= h($mechanics->id) ?></td>
                    <td><?= h($mechanics->name) ?></td>
                    <td><?= h($mechanics->surname) ?></td>
                    <td><?= h($mechanics->service_id) ?></td>
                    <td><?= h($mechanics->salary) ?></td>
                    <td><?= h($mechanics->address) ?></td>
                    <td><?= h($mechanics->phone) ?></td>
                    <td><?= h($mechanics->status) ?></td>
                    <td><?= h($mechanics->created) ?></td>
                    <td><?= h($mechanics->modified) ?></td>
                    <td class="actions">
                        <?php if($current_user['role'] === 'Administrador'):?>
                        <?= $this->Html->link('', ['controller' => 'Mechanics', 'action' => 'view', $mechanics->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Mechanics', 'action' => 'edit', $mechanics->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Mechanics', 'action' => 'delete', $mechanics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mechanics->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    <?php else: ?>
                        <?= $this->Html->link('', ['controller' => 'Mechanics', 'action' => 'view', $mechanics->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?php endif ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body"><?php echo __('no related Mechanics') ?></p>
    <?php endif; ?>
</div>
