<?php

return [
    'title' => 'Статистика',
    'description' => 'На цій сторінці ви можете переглядати статистику гравців',
    'table' => [
        'player' => 'Гравець',
        'points' => 'Бали',
        'rank' => 'Ранг',
        'kd' => 'К/Д',
        'kills' => 'Вбивства',
        'deaths' => 'Смерті',
    ],
    'kd_ratio' => 'Відношення К/Д',
    'top_killers' => 'Топ вбивць',
    'top_players' => 'Топ гравців',
    'settings' => [
        'table_name' => 'Назва таблиці',
        'table_name_placeholder' => 'Введіть назву таблиці (наприклад, base)',
        'table_name_help' => 'Назва таблиці LevelRanks у базі даних (зазвичай "base")',
    ],
    'select_server' => 'Оберіть сервер',
    'on_server' => 'на сервері :id',
    'errors' => [
        'no_lr_servers' => 'Немає доступних серверів LevelRanks',
        'database_error' => 'Помилка підключення до бази даних',
    ],
];
