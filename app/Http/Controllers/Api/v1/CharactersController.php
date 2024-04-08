<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Http\Requests\CharacterRequest;
use Illuminate\Validation\ValidationException;

class CharactersController extends Controller
{
    private $paginate = 15;
    public function index (Character $character) {
        try {
            return response()->json(['data' => Character::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store (CharacterRequest $request, Character $model) {
        try {
            $data = $model->create($request->validated());
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update (CharacterRequest $request, Character $character) {
        try {
            $character->update($request->validated());
            return response()->json(['success' => true, 'data' => $character], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show (Character $character) {
        try {
            return response()->json(['success' => true, 'data' => $character], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy (Character $character) {
        try {
            $character->delete();
            return response()->json(['success' => true, 'data' => $character], 200);
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
