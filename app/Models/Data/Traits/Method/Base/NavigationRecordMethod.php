<?php

namespace App\Models\Data\Traits\Method\Base;

use App\Exceptions\GeneralException;

/**
 * Class NavigationRecordMethod
 * @package App\Models\Data\Traits\Method\Base
 */
trait NavigationRecordMethod
{
    /**
     * @param string $columnName
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getNextRecordByColumn(string $columnName = 'id')
    {
        $record = $this->getBuildNavigationRecord($columnName, false, false);

        if (!$record) {
            $record = $this->getBuildNavigationRecord($columnName, true, false);
        }

        return $record;
    }

    /**
     * @param string $columnName
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getPreviousRecordByColumn(string $columnName = 'id')
    {
        $record = $this->getBuildNavigationRecord($columnName, true, true);

        if (!$record) {
            $record = $this->getBuildNavigationRecord($columnName, false, true);
        }

        return $record;
    }

    /**
     * @param string $columnName
     * @param bool $orderOperator
     * @param bool $order
     * @return \Illuminate\Database\Eloquent\Model|null
     * @throws GeneralException
     */
    private function getBuildNavigationRecord(string $columnName, bool $orderOperator, bool $order)
    {
        if (!$this->getAttribute($columnName)) {
            throw new GeneralException('Attribute {' . $columnName . '} of model ' . get_class() . ' not exists!');
        }

        $record = $this->where($columnName, $orderOperator ? '<' : '>', $this->{$columnName});

        if ($order) {
            $record->latest($columnName);
        } else {
            $record->oldest($columnName);
        }

        return $record->first();
    }
}
