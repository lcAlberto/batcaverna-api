<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
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
            return response()->json(['squads' => Squad::paginate($this->paginate)]);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function store(SquadRequest $request, Squad $model)
    {
        try {
            $data = $model->create($request->validated());
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function update(SquadRequest $request, Squad $squad)
    {
        try {
            $squad->update($request->validated());
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

    public function connectSquadCharacter(Character $character, Squad $squad)
    {
        try {
//        $character->squad()->associate($squad);
            $squad->characters()->save($character);

            return response()->json(['success' => true, 'message' => 'Herói adicionado a esquadrão'], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function disassociateCharacter(Character $character, Squad $squad)
    {
        try {
        $character->squad()->dissociate();
        $character->save();

        return response()->json(['success' => true, 'message' => 'Herói removido de esquadrão'], 200);
        } catch (\Exception $exception) {
            return $this->getExceptions($exception);
        }
    }

    public function connectMissionSquad(Squad $squad, Mission $mission)
    {
        try {
        $squad->missions()->attach($mission);

        return response()->json(['success' => true, 'data' => $squad], 200);
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
