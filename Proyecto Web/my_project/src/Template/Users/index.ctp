<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
	<div class="container-fluid">
		<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i><?php echo __('Users') ?></h1>

		</div>
	</div> 
	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
		<li><a href="#list" data-toggle="tab"><?php echo __('List') ?></a></li>
	</ul>


<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('role_id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('surname'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
	    <th><?= $this->Paginator->sort('status'); ?></th>
            <th><?= $this->Paginator->sort('address'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td>
                <?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?>
            </td>
            <td><?= h($user->name) ?></td>
            <td><?= h($user->surname) ?></td>
            <td><?= h($user->email) ?></td>

	    <?php if(h($user->status)==1): ?>
		    <td><span class="btn btn-default glyphicon glyphicon-ok"</td>
	    <?php endif; ?>
	    <?php if(h($user->status)==0): ?>
                    <td><span class="btn btn-default glyphicon glyphicon-remove"</td>
            <?php endif; ?>
	


            <td><?= h($user->address) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
