

<?= service('validation')->listErrors() ?>

<form action="/member/create" method="post">
    <?= csrf_field() ?>

    <label for="name">Name<label>
    <input type="input" name="name" /><br />

    <label for="email">Email<label>
    <input type="email" name="email" /><br />

    <label for="password">Password<label>
    <input type="password" name="password" /><br />

    <input type="submit" name="submit" value="Register" />
</form>