<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
</head>

<body>
    <h1>Registration Page</h1>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div>
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div>
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <form action="<?= route_to('register.post') ?>" method="post">
        <div>
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password">
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>

</html>