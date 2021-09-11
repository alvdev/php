<table>
    <thead>
        <tr>
            <th>title 1</th>
            <th>title 1</th>
            <th>title 1</th>
            <th>title 1</th>
            <th>title 1</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pisos as $piso) : ?>
            <tr>
                <td><?= $piso[1] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
