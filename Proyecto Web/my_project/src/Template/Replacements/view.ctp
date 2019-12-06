<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($replacement->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($replacement->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($replacement->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Category') ?></td>
            <td><?= $replacement->has('category') ? $this->Html->link($replacement->category->name, ['controller' => 'Categories', 'action' => 'view', $replacement->category->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($replacement->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Unit Price') ?></td>
            <td><?= $this->Number->format($replacement->unit_price) ?></td>
        </tr>
	<tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($replacement->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($replacement->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($replacement->modified) ?></td>
        </tr>
    </table>
</div>
<?php if($current_user['role'] === 'Administrador'):?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Details') ?></h3>
    </div>
    <?php if (!empty($replacement->details)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Facture Id') ?></th>
                <th><?= __('Replacement Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($replacement->details as $details): ?>
                <tr>
                    <td><?= h($details->id) ?></td>
                    <td><?= h($details->facture_id) ?></td>
                    <td><?= h($details->replacement_id) ?></td>
                    <td><?= h($details->amount) ?></td>
                    <td><?= h($details->unit_price) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Details', 'action' => 'view', $details->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Details', 'action' => 'edit', $details->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Details', 'action' => 'delete', $details->id], ['confirm' => __('Are you sure you want to delete # {0}?', $details->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!--<p class="panel-body">no related Details</p>-->
    <?php endif; ?>
</div>

<?php endif ?>

