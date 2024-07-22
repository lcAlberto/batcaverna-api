<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Weakness;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class WeaknessesController extends Controller
{
    private $paginate = 15;

    public function index(Weakness $weakness)
    {
        try {
            return response()->json(['data' => Weakness::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store(Request $request, Weakness $model)
    {
        try {
            $data = $model->create($request->all());
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show(Weakness $weakness)
    {
        try {
            return response()->json(['success' => true, 'data' => $weakness], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update(Request $request, Weakness $weakness)
    {
        try {
            $weakness->update($request->all());
            return response()->json(['success' => true, 'data' => $weakness], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy(Weakness $weakness)
    {
        try {
            $weakness->delete();
            return response()->json(['success' => true, 'data' => $weakness], 200);
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
