<?php

namespace Flute\Modules\StatsFree\Admin\Drivers;

use Flute\Admin\Packages\Server\Contracts\ModDriverInterface;

class LRModDriver implements ModDriverInterface
{
    /**
     * Get the driver name.
     */
    public function getName(): string
    {
        return "LR";
    }

    /**
     * Get the settings view for this driver.
     */
    public function getSettingsView(): string
    {
        return 'module-statsfree::admin.lr';
    }

    public function hasSettings(): bool
    {
        return true;
    }

    /**
     * Get validation rules for this driver's settings.
     */
    public function getValidationRules(): array
    {
        return [
            'table_name' => 'required',
        ];
    }

    /**
     * Prepare data for this driver.
     */
    public function prepareData(array $data): array
    {
        $data['table_name'] = $data['table_name'] ?? '';
        return $data;
    }
} 