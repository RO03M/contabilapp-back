<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller {

    protected $paginate = 20;

    public function get(ClientRequest $request) {
        $data = $request->validated();

        $clients = Client::paginate($this->paginate);
        
        return response()->json([
            "clients" => ClientResource::collection($clients),
            "pagination" => [
                "lastPage" => $clients->lastPage()
            ]
        ], 200);
    }

    public function find($id) {
        $client = Client::find($id);

        if ($client == null) return response()->json([
            "message" => "Cliente não encontrado"
        ], 404);

        return response()->json([
            "client" => ClientResource::make($client)
        ]);
    }

    public function create(ClientRequest $request) {
        $data = $request->validated();
        
        $client = new Client();
        $client->fill($data);
        if ($client->save()) return response()->json([
            "message" => "Cliente criado com sucesso",
            "client" => ClientResource::make($client)
        ], 200);
        else return response()->json([
            "message" => "Falha ao criar cliente"
        ], 500);
    }

    public function alter(ClientRequest $request) {
        $data = $request->validated();

        $client = Client::find($data["id"]);
        if ($client == null) return response()->json([
            "message" => "Cliente não encontrado"
        ], 404);

        $client->fill($data);

        if ($client->save()) return response()->json([
            "message" => "Cliente alterado com sucesso",
            "client" => ClientResource::make($client)
        ], 200);
        else return response()->json([
            "message" => "Falha ao alterar cliente"
        ], 500);
    }

    public function delete(ClientRequest $request) {
        $data = $request->validated();
     
        $client = Client::find($data["id"]);
        if ($client == null) return response()->json([
            "message" => "Cliente não encontrado"
        ], 404);

        if ($client->delete()) return response()->json([
            "message" => "Cliente deletado com sucesso"
        ], 200);
        else return response()->json([
            "message" => "Falha ao deletar cliente"
        ], 500);
    }

}
