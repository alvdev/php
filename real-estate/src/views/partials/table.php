<?php

use app\controllers\QueryController;

$get = new QueryController();
echo '<pre>';
print_r($get);
echo '</pre>';

$db = new app\models\Query('piso_referencia, piso_precio_venta', 'pisos');

$columnsTitle = ['Ref', 'Precio'];
$columnTitleCount = count($columnsTitle);
$properties = $db->select();

?>

<table>
    <thead>
        <tr>
            <?php foreach ($columnsTitle as $columnTitle) : ?>
                <th><?= $columnTitle ?></th>
            <?php endforeach ?>
            <th>Ref</th>
            <th>title 1</th>
            <th>title 1</th>
            <th>title 1</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property) : ?>
            <tr>
                <td><?= $property[0] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
