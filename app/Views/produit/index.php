<!DOCTYPE html>
<html>
<head>
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="container">

<h2>Liste des Produits</h2>

<a class="action-link" href="<?= site_url('produit/create') ?>">Ajouter un produit</a>

<table>
    <tr>
        <th>ID</th>
        <th>Désignation</th>
        <th>Prix</th>
        <th>Quantité en stock</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($produits as $produit): ?>
    <tr>
        <td><?= $produit['id'] ?></td>
        <td><?= $produit['designation'] ?></td>
        <td><?= $produit['prix'] ?></td>
        <td><?= $produit['quantite_stock'] ?></td>
        <td class="table-actions">
            <a href="<?= site_url('produit/edit/'.$produit['id']) ?>">Modifier</a>
            <a href="<?= site_url('produit/delete/'.$produit['id']) ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>