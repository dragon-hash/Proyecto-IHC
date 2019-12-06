
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($facture->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $facture->has('user') ? $this->Html->link($facture->user->name, ['controller' => 'Users', 'action' => 'view', $facture->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($facture->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($facture->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($facture->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Details') ?></h3>
    </div>
    <?php if (!empty($facture->details)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Facture Id') ?></th>
                <th><?= __('Replacement') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th><?= __('Price Total') ?></th>
                
                
            </tr>
            </thead>
            <tbody>
	    <?php $total=0; ?>
            <?php foreach ($facture->details as $details): ?>
		<?php $total=$total+$details->price_total;?>
                <tr>
                    <td><?= h($details->id) ?></td>
                    <td><?= h($details->facture_id) ?></td>
                    <td><?= h($details->replacement->name) ?></td>
                    <td><?= h($details->amount) ?></td>
                    <td><?= h($details->unit_price) ?></td>
                    <td><?= h($details->price_total) ?></td>
                    
                    <td class="actions">
                        <?php if($current_user['role'] === 'Administrador'):?>
                            <?= $this->Html->link('', ['controller' => 'Details', 'action' => 'view', $details->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                            <?= $this->Html->link('', ['controller' => 'Details', 'action' => 'edit', $details->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                            <?= $this->Form->postLink('', ['controller' => 'Details', 'action' => 'delete', $details->id], ['confirm' => __('Are you sure you want to delete # {0}?', $details->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                        
                        <?php endif ?>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
	    <tr><td></td><td></td><td></td><td></td><td></td><td><?= __('Total to pay:	') ?><?= $total ?></td></tr>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body"><?php echo __('no related Details') ?></p>
    <?php endif; ?>
</div>
