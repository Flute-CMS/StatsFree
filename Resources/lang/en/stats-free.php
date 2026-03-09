<?php

return [
    'title' => 'Statistics',
    'description' => 'On this page, you can view player statistics',
    'table' => [
        'player' => 'Player',
        'points' => 'Points',
        'rank' => 'Rank',
        'kd' => 'K/D',
        'kills' => 'Kills',
        'deaths' => 'Deaths',
    ],
    'kd_ratio' => 'K/D Ratio',
    'top_killers' => 'Top Killers',
    'top_players' => 'Top Players',
    'settings' => [
        'table_name' => 'Table Name',
        'table_name_placeholder' => 'Enter table name (e.g., base)',
        'table_name_help' => 'Name of the LevelRanks database table (usually "base")',
    ],
    'select_server' => 'Select Server',
    'on_server' => 'on server :id',
    'errors' => [
        'no_lr_servers' => 'No LevelRanks servers available',
        'database_error' => 'Database connection error',
    ],
];
