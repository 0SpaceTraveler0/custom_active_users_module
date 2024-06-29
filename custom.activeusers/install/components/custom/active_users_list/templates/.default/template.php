<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<table>
    <thead>
    <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Логин</th>
        <th>Email</th>
        <th>Дата регистрации</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($arResult as $user): ?>
        <tr>
            <td><?= htmlspecialcharsbx($user['LAST_NAME']) ?></td>
            <td><?= htmlspecialcharsbx($user['NAME']) ?></td>
            <td><?= htmlspecialcharsbx($user['LOGIN']) ?></td>
            <td><?= htmlspecialcharsbx($user['EMAIL']) ?></td>
            <td><?= htmlspecialcharsbx($user['DATE_REGISTER']->toString()) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>