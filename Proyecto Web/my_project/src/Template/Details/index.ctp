<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
  
	<div class="container-fluid">
		<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-timer zmdi-hc-fw"></i><?php echo __('Details') ?></h1>
		</div>
	</div>
	<ul class="nav nav-tabs" style="margin-bottom: 15px;">
		<li><a href="#list" data-toggle="tab"><?php echo __('List') ?></a></li>
	</ul>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('facture_id'); ?></th>
            <th><?= $this->Paginator->sort('replacement_id'); ?></th>
            <th><?= $this->Paginator->sort('amount'); ?></th>
            <th><?= $this->Paginator->sort('unit_price'); ?></th>
            <th><?= $this->Paginator->sort('price_total'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($details as $detail): ?>
        <tr>
            <td><?= $this->Number->format($detail->id) ?></td>
            <td>
                <?= $detail->has('facture') ? $this->Html->link($detail->facture->id, ['controller' => 'Factures', 'action' => 'view', $detail->facture->id]) : '' ?>
            </td>
            <td>
                <?= $detail->has('replacement') ? $this->Html->link($detail->replacement->name, ['controller' => 'Replacements', 'action' => 'view', $detail->replacement->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($detail->amount) ?></td>
	    <td><?= $this->Number->format($detail->unit_price) ?></td>
            <td><?= $this->Number->format($detail->price_total) ?></td>
            <td><?= h($detail->created) ?></td>
            <td class="actions">
                <?php if($current_user['role'] === 'Administrador'):?>
                    <?= $this->Html->link('', ['action' => 'view', $detail->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                    <?= $this->Html->link('', ['action' => 'edit', $detail->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $detail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detail->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                <?php else: ?>
                    <?= $this->Html->link('', ['action' => 'view', $detail->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
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
