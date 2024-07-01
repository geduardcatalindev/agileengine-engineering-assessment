<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LocationRepository implements LocationRepositoryInterface
{
    public function index(array $filterData)
    {
        if (!count($filterData)) {
            return [
                'status' => 'success',
                'data' => Location::all()
            ];
        }

        if (!$this->checkDependentFields(['radius', 'latitude', 'longitude'], $filterData)) {
            throw new \Exception("One or multiple query params are missing from the request.");
        }

        $locationData = DB::select("SELECT *
            FROM location
            WHERE (
                ACOS(
                    SIN(RADIANS(?)) * SIN(RADIANS(latitude)) +
                    COS(RADIANS(?)) * COS(RADIANS(latitude)) *
                    COS(RADIANS(?) - RADIANS(longitude))
                ) * 6371
            ) <= ?", [
            $filterData['latitude'],
            $filterData['latitude'],
            $filterData['longitude'],
            $filterData['radius'],
        ]);

        return [
            'status' => 'success',
            'data' => $locationData,
        ];
    }

    public function show(int $id)
    {
        $data = Location::find($id);

        return [
            'status' => $data ? 'success' : 'failed',
            'data' => $data,
        ];
    }

    private function checkDependentFields(array $fields, array $data): bool
    {
        foreach ($fields as $v) {
            if (!isset($data[$v])) {
                return false;
            }
        }

        return true;
    }
}
