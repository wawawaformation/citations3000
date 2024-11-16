



<div class="cards container">
<h2 class="mb-4">Liste de auteurs</h2>
<a href="/authors/add" class="btn btn-primary mb-3">Ajouter un auteur</a>
<div class="row">
<?php foreach($data as $author) : ?>
    <div class="card col-12 col-md-4">
        <img src="<?= $author->getSrc() ?>" alt="" height="200">
        <h3><?= $author->getAuthor() ?></h3>
        <div><?= substr($author->getBiography(), 0, 100) .'...' ?></div>
        <div class="actions">
            <a href="/authors/<?= $author->getId() ?>">Lire la suite</a>
            <a href="/authors/update/<?= $author->getId() ?>">Modifier</a>
            <a href="/authors/delete/<?= $author->getId() ?>">Supprimer</a>
        </div>
    </div>
<?php endforeach ?>
</div>
</div>


