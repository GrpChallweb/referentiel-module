<?php
require 'app/models/Module.php';

require 'partials/head.php';

$module = new Module();
?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($module->all() as $module): ?>
        <tr>
            <td><?= $module['id'] ?></td>
            <td><?= $module['libele'] ?></td>
            <td>
                <a href="update-module.php?id=<?= $module['id'] ?>">Modifier</a>
                <a class="text-danger" href="delete-module.php?id=<?= $module['id'] ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</div>
</body>
</html>