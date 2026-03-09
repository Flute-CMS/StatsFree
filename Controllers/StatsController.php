<?php

namespace Flute\Modules\StatsFree\Controllers;

use Flute\Core\Database\Entities\Server;
use Flute\Core\Router\Annotations\Route;
use Flute\Core\Support\BaseController;
use Flute\Core\Support\FluteRequest;

class StatsController extends BaseController
{
    #[Route(name: 'stats.index', uri: '/stats', methods: ['GET'])]
    public function index(FluteRequest $fluteRequest)
    {
        $databaseService = app(\Flute\Core\Services\DatabaseService::class);
        $servers = $databaseService->getServersByMode(['LR']);

        if (empty($servers)) {
            return $this->error("No LR servers available", 500);
        }

        return view("module-statsfree::index", ['servers' => $servers]);
    }
}
