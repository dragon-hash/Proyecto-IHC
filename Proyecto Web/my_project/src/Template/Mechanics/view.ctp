<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($mechanic->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($mechanic->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Surname') ?></td>
            <td><?= h($mechanic->surname) ?></td>
        </tr>
        <tr>
            <td><?= __('Service') ?></td>
            <td><?= $mechanic->has('service') ? $this->Html->link($mechanic->service->name, ['controller' => 'Services', 'action' => 'view', $mechanic->service->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Address') ?></td>
            <td><?= h($mechanic->address) ?></td>
        </tr>
        <tr>
            <td><?= __('Phone') ?></td>
            <td><?= h($mechanic->phone) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($mechanic->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Salary') ?></td>
            <td><?= $this->Number->format($mechanic->salary) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($mechanic->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($mechanic->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $mechanic->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Cars') ?></h3>
    </div>
    <?php if (!empty($mechanic->cars)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('License') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Maker') ?></th>
                <th><?= __('Colour') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($mechanic->cars as $cars): ?>
                <tr>
                    <td><?= h($cars->id) ?></td>
                    <td><?= h($cars->license) ?></td>
                    <td><?= h($cars->user_id) ?></td>
                    <td><?= h($cars->maker) ?></td>
                    <td><?= h($cars->colour) ?></td>
                    <td><?= h($cars->created) ?></td>
                    <td><?= h($cars->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Cars', 'action' => 'view', $cars->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Cars', 'action' => 'edit', $cars->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Cars', 'action' => 'delete', $cars->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cars->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body"><?php echo __('no related Cars') ?></p>
    <?php endif; ?>
</div>
