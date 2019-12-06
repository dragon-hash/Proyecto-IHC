<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
	<div class="container-fluid">
		<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i><?php echo __('Mechanics') ?></h1>
		</div>
	</div>
	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
		<li><a href="#list" data-toggle="tab"><?php echo __('List') ?></a></li>
	</ul>


<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('surname'); ?></th>
            <th><?= $this->Paginator->sort('service_id'); ?></th>
            <th><?= $this->Paginator->sort('salary'); ?></th>
            <th><?= $this->Paginator->sort('address'); ?></th>
            <th><?= $this->Paginator->sort('phone'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mechanics as $mechanic): ?>
        <tr>
            <td><?= $this->Number->format($mechanic->id) ?></td>
            <td><?= h($mechanic->name) ?></td>
            <td><?= h($mechanic->surname) ?></td>
            <td>
                <?= $mechanic->has('service') ? $this->Html->link($mechanic->service->name, ['controller' => 'Services', 'action' => 'view', $mechanic->service->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($mechanic->salary) ?></td>
            <td><?= h($mechanic->address) ?></td>
            <td><?= h($mechanic->phone) ?></td>
            <td class="actions">
                <?php if($current_user['role'] === 'Administrador'):?>
                    <?= $this->Html->link('', ['action' => 'view', $mechanic->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $mechanic->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $mechanic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mechanic->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                <?php else: ?>
                    <?= $this->Html->link('', ['action' => 'view', $mechanic->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?php endif ?>
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
