<table class="table table-striped">

    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Имя</th>
        <th scope="col">Возраст</th>
        <th scope="col">Язык</th>
    </tr>
    </thead>

    <tbody>
		<?php foreach ($employess as $student): ?>
        <tr>
            <th scope="row"><?= $student['id'] ?></th>
            <td><?= $student['name'] ?></td>
            <td><?= $student['age'] ?></td>
            <td><?= $student['lang'] ?></td>

        </tr>
		<?php endforeach ?>
    </tbody>
</table>
