
<h1>Se connecter</h1>

<?php if (isset($_GET['forbidden'])): ?>
    <div class="alert alert-danger">
        Vous ne pouvez pas accéder à cette page
    </div>
<?php endif ?>

<form action="<?= $router->url('login') ?>" method="post">
    <?= $form->input('username', 'Nom d\'utilisateur'); ?>
    <?= $form->input('password', 'Mot de passe'); ?>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>