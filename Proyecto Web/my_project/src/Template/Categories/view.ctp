<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($category->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= h($category->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Replacements') ?></h3>
    </div>
    <?php if (!empty($category->replacements)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Unit Price') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($category->replacements as $replacements): ?>
                <tr>
                    <td><?= h($replacements->id) ?></td>
                    <td><?= h($replacements->name) ?></td>
                    <td><?= h($replacements->description) ?></td>
                    <td><?= h($replacements->category_id) ?></td>
                    <td><?= h($replacements->unit_price) ?></td>
                    <td><?= h($replacements->created) ?></td>
                    <td><?= h($replacements->modified) ?></td>
                    <td class="actions">
                        <?php if($current_user['role'] === 'Administrador'):?>
                            <?= $this->Html->link('', ['controller' => 'Replacements', 'action' => 'view', $replacements->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                            <?= $this->Html->link('', ['controller' => 'Replacements', 'action' => 'edit', $replacements->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                            <?= $this->Form->postLink('', ['controller' => 'Replacements', 'action' => 'delete', $replacements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $replacements->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                        <?php else: ?>
                            <?= $this->Html->link('', ['controller' => 'Replacements', 'action' => 'view', $replacements->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?php endif ?>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body"><?php echo __('no related Replacements') ?></p>
    <?php endif; ?>
</div>
