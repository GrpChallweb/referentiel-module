<?php

require 'partials/head.php';

?>
<form action="create-module.php" method="post">
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input class="form-control" id="libelle" type="text" placeholder="Libellé du module" name="libelle">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>
<?php

if(isset($_POST)) {
    if(isset($_POST['libelle'])) {
        (new Module())->create($_POST['libelle']);
    }
}

?>
</body>
</html>