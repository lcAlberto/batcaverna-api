<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SkillsController extends Controller
{
    private $paginate = 15;

    public function index (Skill $skill) {
        try {
            return response()->json(['data' => Skill::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store (Request $request, Skill $model) {
        try {
            $data = $model->create($request->all('name'));
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show (Skill $skill) {
        try {
            return response()->json(['success' => true, 'data' => $skill], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update (Request $request, Skill $skill) {
        try {
            $skill->update($request->all('name'));
            return response()->json(['success' => true, 'data' => $skill], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy (Skill $skill) {
        try {
            $skill->delete();
            return response()->json(['success' => true, 'data' => $skill], 200);
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
