<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');

?>
	<div class="container-fluid">
		<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i><?php echo __('Cars') ?></h1>
		</div>
	</div>
	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
		<li><a href="#list" data-toggle="tab"><?php echo __('List') ?></a></li>
	</ul>


<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('license'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('maker'); ?></th>
            <th><?= $this->Paginator->sort('colour'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cars as $car): ?>
        <tr>
            <td><?= $this->Number->format($car->id) ?></td>
            <td><?= h($car->license) ?></td>
            <td>
                <?= $car->has('user') ? $this->Html->link($car->user->name, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?>
            </td>
            <td><?= h($car->maker) ?></td>
            <td><?= h($car->colour) ?></td>
            <td><?= h($car->created) ?></td>
            <td><?= h($car->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $car->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $car->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
