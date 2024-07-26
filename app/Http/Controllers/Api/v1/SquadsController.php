<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SquadCharacterRequest;
use App\Http\Requests\SquadMissionRequest;
use App\Http\Requests\SquadRequest;
use App\Models\Character;
use App\Models\Mission;
use App\Models\Squad;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SquadsController extends Controller
{
    private $paginate = 15;
    public function index()
    {
        try {
            return response()->json(['squads' => Squad::with('characters')->paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store(SquadRequest $request, Squad $model)
    {
        try {
            $data = $request->validated();
            $squad = $model->create($data);
            if ($data['hero_ids']) {
                foreach ($data['hero_ids'] as $characterId) {
                    $character = Character::findOrFail($characterId);
                    $character->squad_id = $squad->id;
                    $character->save();
                }
            }
            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update(SquadRequest $request, Squad $squad)
    {
        try {
            $data = $request->validated();
            $squad->update($data);

            $characterIds = $data['hero_ids'];
            $currentCharacterIds = $squad->characters()->pluck('id')->toArray();
            $charactersToAdd = array_diff($characterIds, $currentCharacterIds);
            $charactersToRemove = array_diff($currentCharacterIds, $characterIds);

            foreach ($charactersToAdd as $characterId) {
                $character = Character::findOrFail($characterId);
                $character->squad_id = $squad->id;
                $character->save();
            }

            foreach ($charactersToRemove as $characterId) {
                $character = Character::findOrFail($characterId);
                $character->squad_id = null;
                $character->save();
            }

            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function show(Squad $squad)
    {
        try {
            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function destroy(Squad $squad)
    {
        try {
            $squad->delete();
            return response()->json(['success' => true, 'data' => $squad], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function connectSquadCharacter(SquadCharacterRequest $request, Squad $squad)
    {
        try {
            $charactersList = $request->validated()['hero_ids'];
            foreach ($charactersList as $characterId) {
                $character = Character::findOrFail($characterId);
                $character->squad_id = $squad->id;
                $character->save();
            }

            return response()->json(['success' => true, 'message' => 'Heróis adicionados a esquadrão'], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function disassociateCharacter(SquadCharacterRequest $request, Character $character, Squad $squad)
    {
        try {
            $charactersList = $request->validated()['hero_ids'];
            foreach ($charactersList as $characterId) {
                $character = Character::findOrFail($characterId);
                $character->squad_id = null;
                $character->squad()->dissociate();
                $character->save();
            }

        return response()->json(['success' => true, 'message' => 'Heróis removidos de esquadrão'], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function connectMissionSquad(SquadMissionRequest $request, Mission $mission)
    {
        try {
            $squadList = $request->validated()['squad_ids'];

            // $validSquadIds = Squad::whereIn('id', $squadList)->pluck('id')->toArray();
            // dd(count($validSquadIds), count($squadList));
            $mission->squads()->attach($squadList);

        return response()->json(['success' => true, 'data' => $mission], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function disassociateMissionSquad(Squad $squad, Mission $mission)
    {
        if (!$squad) {
            return response()->json(['error' => true, 'message' => 'Esquadrão não encontrado!'], 401);
        }

        $squad->missions()->detach($mission);

        return response()->json(['success' => true, 'data' => $squad], 200);
    }

    public function search(Request $request, Squad $model)
    {
        try {
            $query = Squad::query();

            if ($request->has('search') && $request->search) {
                $search = $request->input('search');
                $query->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
            }

            if ($request->has('objectives') && $request->objectives) {
                $objectives = $request->input('objectives');
                $query->where('name', 'LIKE', "%$objectives%");
            }

            $squad = $query->get();

            return response()->json(['success' => true, 'data' => $squad], 200);
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
