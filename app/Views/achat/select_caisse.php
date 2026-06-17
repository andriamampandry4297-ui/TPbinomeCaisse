<!DOCTYPE html>
<html>
<head>
    <title>Choisir une caisse</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="container">

<h2>Choisir une caisse</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= site_url('caisse/select') ?>" method="post">
    <label for="caisse_id">Caisse :</label><br>
    <select name="caisse_id" id="caisse_id" required>
        <option value="">-- Sélectionner --</option>
        <?php foreach ($caisses as $caisse): ?>
            <option value="<?= $caisse['id'] ?>"><?= esc($caisse['numero_caisse']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Valider</button>
</form>

</div>
</body>
</html>
