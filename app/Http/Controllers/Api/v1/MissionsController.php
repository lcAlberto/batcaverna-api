<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MissionRequest;
use App\Models\Mission;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    private $paginate = 15;
    public function index()
    {
        try {
            return response()->json(['missions' => Mission::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store(MissionRequest $request, Mission $model)
    {
        try {
            $data = $model->create($request->validated());
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update(MissionRequest $request, Mission $squad)
    {
        try {
            $squad->update($request->validated());
            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show(Mission $mission)
    {
        try {
            return response()->json(['success' => true, 'data' => $mission], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy(Mission $squad)
    {
        try {
            $squad->delete();
            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function search(Request $request, Mission $model)
    {
        try {
            $query = Mission::query();


            if ($request->has('search') && $request->search) {
                $search = $request->input('search');
                $query->where('name', 'LIKE', "%$search%");
            }

            if ($request->has('characters') && $request->characters) {
                $characters = $request->input('search');

                $query->where('name', 'LIKE', "%$characters%");
            }

            if ($request->has('coordinates') && $request->coordinates) {
                $coordinates = $request->input('coordinates');
                $query->where('coordinates', '=', $coordinates);
            }

            if ($request->has('urgency_level') && $request->urgency_level) {
                $urgency = $request->input('urgency_level');
                $query->where('urgency_level', '=', $urgency);
            }

            $mission = $query->get();

            return response()->json(['success' => true, 'data' => $mission], 200);
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
