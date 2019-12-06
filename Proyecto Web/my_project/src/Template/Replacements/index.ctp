<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
	<div class="container-fluid">
		<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i><?php echo __('Replacements') ?></h1>
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
            <th><?= $this->Paginator->sort('category_id'); ?></th>
            <th><?= $this->Paginator->sort('unit_price'); ?></th>
	    <th><?= $this->Paginator->sort('quantity'); ?></th>
           
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($replacements as $replacement): ?>
        <tr>
            <td><?= $this->Number->format($replacement->id) ?></td>
            <td><?= h($replacement->name) ?></td>
            <td>
                <?= $replacement->has('category') ? $this->Html->link($replacement->category->name, ['controller' => 'Categories', 'action' => 'view', $replacement->category->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($replacement->unit_price) ?></td>
	    <td><?= h($replacement->quantity) ?></td>
          
            <td class="actions">
                <?php if($current_user['role'] === 'Administrador'):?>
                    <?= $this->Html->link('', ['action' => 'view', $replacement->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $replacement->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $replacement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $replacement->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                <?php else: ?>
                     <?= $this->Html->link('', ['action' => 'view', $replacement->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
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
