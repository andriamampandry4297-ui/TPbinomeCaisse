<!DOCTYPE html>
<html>
<head>
    <title>Modifier Produit</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="container">

<h2>Modifier Produit</h2>

<form action="<?= site_url('produit/update/'.$produit['id']) ?>" method="post">

    <label>Désignation :</label><br>
    <input type="text"
           name="designation"
           value="<?= $produit['designation'] ?>"
           required><br><br>

    <label>Prix :</label><br>
    <input type="number"
           step="0.01"
           name="prix"
           value="<?= $produit['prix'] ?>"
           required><br><br>

    <label>Quantité en stock :</label><br>
    <input type="number"
           name="quantite_stock"
           value="<?= $produit['quantite_stock'] ?>"
           required><br><br>

    <button type="submit">Modifier</button>

</form>

<div class="form-actions">
    <a class="action-link" href="<?= site_url('produits') ?>">Retour</a>
</div>

</body>
</html>