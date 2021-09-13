<?php

use app\controllers\QueryController;

$obj = new QueryController();
$provinces = $obj->getProvinces();

$filter = $obj->filter();
echo $filter;

?>

<form action="" id="filter">
    <div class="btn-group">
        <div>
            <input type="radio" name="operation" id="operation" value="sale">
            <label for="sale" class="btn">Sale</label>
        </div>
        <div>
            <input type="radio" name="operation" id="rent" value="rent">
            <label for="rent" class="btn">Rent</label>
        </div>
    </div>

    <div>
        <?php foreach ($provinces as $province) : ?>
            <div>
                <input type="checkbox" name="province[]" id="province" value="<?= $province['prov_nombre'] ?>">
                <label for="sale"><?= $province['prov_nombre'] ?></label>
            </div>
        <?php endforeach ?>
    </div>

    <div>
        <label for="limit">Limit</label>
        <select name="limit" id="limit">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
    </div>

    <div class="price">
        <label for="price">Max. price</label>
        <input name="price" type="range" id="price" value="100000" min="0" max="1000000">
        <output>100,000€</output>
    </div>

    <button class="btn submit">Filter results</button>
</form>
