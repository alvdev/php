<?php

use app\controllers\QueryController;

$list = new QueryController();
$properties = $list->getProperties();

$columnsTitle = ['Ref', 'Sale/Rent', 'Type', 'Province', 'Area', 'Price'];
$columnTitleCount = count($columnsTitle);

?>

<table>
    <thead>
        <tr>
            <?php foreach ($columnsTitle as $columnTitle) : ?>
                <th><?= $columnTitle ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($properties as $property) : ?>
            <tr>
                <td><?= $property['piso_referencia'] ?></td>
                <td><?= $property['op_operacion'] ?></td>
                <td><?= $property['tipo_nombre'] ?></td>
                <td><?= $property['prov_nombre'] ?></td>
                <td><?= $property['piso_superficie'] . 'm<sup>2</sup>' ?></td>
                <td><?= number_format($property['piso_precio_venta'], 0, ',', '.') ?>€</td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
