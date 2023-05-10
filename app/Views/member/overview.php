

<?php if (! empty($member) && is_array($member)): ?>

    <?php foreach ($member as $member_item): ?>

        <h3><?= esc($member_item['name']) ?></h3>

        <div class="main">
            <?= esc($member_item['email']) ?>
        </div>

    <?php endforeach; ?>

<?php else: ?>

    <h3>No member</h3>

    <p>Unable to find any member for you.</p>

<?php endif ?>