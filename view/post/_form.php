<form action="" method="post">
    <?= $form->input('pseudo', 'Votre pseudo') ?>
    <?= $form->textarea('content', 'Votre commentaire') ?>
    <button class="btn btn-primary">Envoyer</button>
</form>