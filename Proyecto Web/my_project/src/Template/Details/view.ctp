<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($detail->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Facture') ?></td>
            <td><?= $detail->has('facture') ? $this->Html->link($detail->facture->id, ['controller' => 'Factures', 'action' => 'view', $detail->facture->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Replacement') ?></td>
            <td><?= $detail->has('replacement') ? $this->Html->link($detail->replacement->name, ['controller' => 'Replacements', 'action' => 'view', $detail->replacement->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($detail->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Amount') ?></td>
            <td><?= $this->Number->format($detail->amount) ?></td>
        </tr>
        <tr>
            <td><?= __('Unit Price') ?></td>
            <td><?= $this->Number->format($detail->replacement->unit_price) ?></td>
        </tr>
        <tr>
            <td><?= __('Price Total') ?></td>
            <td><?= $this->Number->format($detail->price_total) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($detail->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($detail->modified) ?></td>
        </tr>
    </table>
</div>

