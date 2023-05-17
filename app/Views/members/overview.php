

<?php if (! empty($members) && is_array($members)): ?>

<?php foreach ($members as $members_item): ?>

    <h3><?= esc($members_item['lastName']) ?></h3>

    <div class="main">
        <?= esc($members_item['email']) ?>
    </div>

<?php endforeach; ?>

<?php else: ?>

<h3>No member</h3>

<p>Unable to find any member for you.</p>

<?php endif ?>