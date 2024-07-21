<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Services\ImageUploadService;

class TeamsController extends Controller
{
    private $paginate = 15;
    protected $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

    public function index()
    {
        try {
            return response()->json(['teams' => Team::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store (TeamRequest $request, Team $model) {
        try {
            $data = $request->validated();

            if ($request['avatar']) {
                $imageName = $this->imageUploadService->uploadImage($request, $data['avatar'], 'public/images/teams');
                $data['avatar'] = $imageName;
            }
        
            $data = $model->create($data);
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update (TeamRequest $request, Team $Team) {
        try {
            $data = $request->validated();

            if ($data['avatar']) {
                $imageName = $this->imageUploadService->uploadImage($request, $data['avatar'], 'public/images/teams');
                $data['avatar'] = $imageName;
            }
            $Team->update($data);
            return response()->json(['success' => true, 'data' => $Team], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show (Team $Team) {
        try {
            return response()->json(['success' => true, 'data' => $Team], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy (Team $Team) {
        try {
            $Team->delete();
            return response()->json(['success' => true, 'data' => $Team], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function getExceptions(\Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            if (request()->ajax() || request()->wantsJson()) {
                $errors = $exception->validator->getMessageBag();
                return response()->json(['error' => $errors], 422);
            }
            return redirect()->back()->withInput()->withErrors($exception->validator->getMessageBag());
        } else {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
