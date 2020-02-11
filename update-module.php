<?php
use App\Model\DB;

require 'partials/head.php';

$module = DB::get()->query('SELECT * FROM module WHERE id = ' . $_GET['id'])->fetch();
?>
<form action="update-module.php?id=<?= $module['id'] ?>" method="post">
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input class="form-control" id="libelle" type="text" value="<?= $module['libele'] ?>" name="libelle">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>
<?php

if(isset($_POST)) {
    if(isset($_POST['libelle'])) {
        (new Module())->update($_GET['id'], $_POST['libelle']);
    }
}

?>
</body>
</html>