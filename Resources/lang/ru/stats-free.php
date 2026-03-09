<?php

return [
    'title' => 'Статистика',
    'description' => 'На этой странице вы можете просматривать статистику игроков',
    'table' => [
        'player' => 'Игрок',
        'points' => 'Очки',
        'rank' => 'Ранг',
        'kd' => 'К/Д',
        'kills' => 'Убийства',
        'deaths' => 'Смерти',
    ],
    'kd_ratio' => 'К/Д Соотношение',
    'top_killers' => 'Топ по убийствам',
    'top_players' => 'Топ игроков',
    'settings' => [
        'table_name' => 'Имя таблицы',
        'table_name_placeholder' => 'Введите имя таблицы (например, base)',
        'table_name_help' => 'Название таблицы LevelRanks в базе данных (обычно "base")',
    ],
    'select_server' => 'Выберите сервер',
    'on_server' => 'на сервере :id',
    'errors' => [
        'no_lr_servers' => 'Нет доступных серверов LevelRanks',
        'database_error' => 'Ошибка подключения к базе данных',
    ],
];
