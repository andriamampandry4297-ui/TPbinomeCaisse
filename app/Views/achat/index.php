<!DOCTYPE html>
<html>
<head>
    <title>Saisie des achats</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="container">

<h2>Saisie des achats</h2>

<div class="info-bar">
    <strong>Caisse choisie :</strong> <?= esc($caisse['numero_caisse']) ?>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<form action="<?= site_url('achats/add') ?>" method="post">
    <label for="produit_id">Produit :</label><br>
    <select name="produit_id" id="produit_id" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($produits as $produit): ?>
            <option value="<?= $produit['id'] ?>"><?= esc($produit['designation']) ?> - <?= esc($produit['prix']) ?> FCFA</option>
        <?php endforeach; ?>
    </select><br><br>

    <label for="quantite">Quantité :</label><br>
    <input type="number" name="quantite" id="quantite" min="1" required><br><br>

    <button type="submit">Valider</button>
</form>

<?php if (! empty($cartItems)): ?>
    <h3>Panier</h3>
    <table>
        <tr>
            <th>Produit</th>
            <th>Prix Unit.</th>
            <th>Qté</th>
            <th>Montant</th>
        </tr>
        <?php foreach ($cartItems as $item): ?>
            <tr>
                <td><?= esc($item['designation']) ?></td>
                <td><?= esc($item['prix']) ?></td>
                <td><?= esc($item['quantite']) ?></td>
                <td><?= esc($item['montant']) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong><?= esc($total) ?></strong></td>
        </tr>
    </table>
<?php else: ?>
    <p>Aucun article dans le panier.</p>
<?php endif; ?>

<div class="form-actions">
    <form action="<?= site_url('achats/close') ?>" method="post" style="display:inline-block;">
        <button type="submit">Clôturer achat</button>
    </form>
    <a class="action-link" href="<?= site_url('caisse') ?>">Changer de caisse</a>
</div>

</div>
</body>
</html>
