<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Http\Requests\CharacterRequest;
use App\Models\Mission;
use App\Models\Squad;
use Illuminate\Http\Request;
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

    public function search(Request $request, Character $model)
    {
        try {
            $query = Character::query();


            if ($request->has('search') && $request->search) {
                $search = $request->input('search');
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('codename', 'LIKE', "%$search%");
            }

            if ($request->has('sex') && $request->sex) {
                $sex = $request->input('sex');
                $query->where('sex', '=', $sex);
            }

            if ($request->has('team_id') && $request->team_id) {
                $team = $request->input('team_id');
                $query->where('team_id', '=', $team);
            }

            if ($request->has('squad_id') && $request->squad_id) {
                $squad = $request->input('squad_id');
                $query->where('squad_id', '=', $squad);
            }

            $character = $query->get();

            return response()->json(['success' => true, 'data' => $character], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function squad(Squad $squad)
    {
        try {
            if (!$squad->id) {
                return response()->json(['message' => 'Esquadrão não encontrado', 'data' => []], 404);
            }
            $character = $squad->characters()->get();
            return response()->json(['success' => true, 'data' => $character], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function mission(Mission $mission)
    {
        try {
            if (!$mission->id) {
                return response()->json(['message' => 'Missão não encontrado', 'data' => []], 404);
            }
            $squadData = $mission->squads()->get();
            $character = Character::whereIn('squad_id', $squadData)->get();

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
