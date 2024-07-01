<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    function __construct(private LocationRepositoryInterface $locationRepository)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'radius' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'One or more validation rules failed. Please check the data you send in the request.',
            ]);
        }

        $filterData = $validator->validate();

        try {
            $response = $this->locationRepository->index($filterData);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }

        // razvan.nanescu@nanescu.com

        return response()->json(
            $response
        );
    }

    public function show(int $id): JsonResponse
    {
        return response()->json(
            $this->locationRepository->show($id)
        );
    }
}
