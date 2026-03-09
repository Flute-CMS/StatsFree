<?php

namespace Flute\Modules\StatsFree\Components;

use Flute\Core\Components\Table;

class StatsFreeTableComponent extends Table
{
    public array $paginationOptions = [15, 30];

    public int $perPage = 15;

    public function mount() : void
    {
        $serverId = intval(request()->get('server_id', null));

        $modes = ['LR'];

        $databaseService = app(\Flute\Core\Services\DatabaseService::class);
        $connectionInfo = $serverId
            ? $databaseService->getConnectionInfoByServerId($serverId, $modes)
            : $databaseService->getPrimaryConnection($modes);

        $prefix = $this->getPrefix($connectionInfo['connection']->dbname, 'lvl_');
        $tableName = $connectionInfo['connection']->getAdditional()['table_name'] ?? 'base';

        $query = db($connectionInfo['connection']->dbname)
            ->select([
                $prefix . $tableName . '.*',
                'steam' => 'steam',
                'name' => 'name',
                'value' => 'value',
                'rank' => 'rank',
                'kills' => 'kills',
                'deaths' => 'deaths'
            ])
            ->from($prefix . $tableName);

        $this->columns = [
            [
                'label' => __('stats-free.table.player'),
                'field' => 'player',
                'allowSort' => false,
                'searchable' => true,
                'searchFields' => ['steam', 'name'],
                'width' => '400px',
                'searchTransform' => function ($value) {
                    try {
                        $convert = new \xPaw\SteamID\SteamID($value);
                        return $convert->RenderSteam2();
                    } catch (\Exception $e) {
                        return $value;
                    }
                },
                'renderer' => function ($row) use ($connectionInfo) {
                    return view('module-statsfree::cells.lr.player', [
                        'row' => $row,
                    ])->render();
                }
            ],
            [
                'label' => __('stats-free.table.points'),
                'field' => 'value',
                'defaultSort' => true,
                'align' => 'center',
                'defaultDirection' => 'desc',
                'allowSort' => true,
                'allowSearch' => false,
                'width' => '100px'
            ],
            [
                'label' => __('stats-free.table.rank'),
                'field' => 'rank',
                'align' => 'center',
                'width' => '100px',
                'allowSort' => true,
                'allowSearch' => false,
                'renderer' => function ($row) use ($connectionInfo) {
                    return view('module-statsfree::cells.lr.rank', [
                        'row' => $row,
                        'server' => $connectionInfo['server'],
                    ])->render();
                }
            ],
            [
                'label' => __('stats-free.table.kd'),
                'field' => 'kd',
                'width' => '100px',
                'allowSort' => false,
                'renderer' => function ($row) {
                    return $row['deaths'] > 0 ? number_format($row['kills'] / $row['deaths'], 2) : '∞';
                }
            ],
            [
                'label' => __('stats-free.table.kills'),
                'field' => 'kills',
                'width' => '100px',
                'allowSort' => true,
                'allowSearch' => false,
            ],
            [
                'label' => __('stats-free.table.deaths'),
                'field' => 'deaths',
                'width' => '100px',
                'allowSort' => true,
                'allowSearch' => false,
            ],
        ];

        $this->setSelect($query);

        parent::mount();
    }

    protected function getPrefix(string $connection, string $default): string
    {
        $db = config("database.databases.{$connection}")['prefix'];

        return !empty($db) ? "" : $default;
    }

    protected function processData(array $data) : array
    {
        $steamIds = array_column($data, 'steam');
        $steamInfo = steam()->getUsersInfo($steamIds);

        foreach ($data as $key => $row) {
            $data[$key]['steam_info'] = $steamInfo[$row['steam']] ?? null;
        }

        return $data;
    }
} 