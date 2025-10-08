<?php
namespace App\Repositories;

use App\Contracts\ServerRepositoryInterface;
use App\Models\Server;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentServerRepository implements ServerRepositoryInterface
{
    public function findById(int $id): ?Server
    {
        return Server::find($id);
    }

    public function findAllForUser(int $userId, int $perPage = 15): LengthAwarePaginator
    {
        return Server::where('owner_id', $userId)->paginate($perPage);
    }

    public function findAll(int $perPage = 15): LengthAwarePaginator
    {
        return Server::paginate($perPage);
    }

    public function create(array $data): Server
    {
        return Server::create($data);
    }

    public function update(Server $server, array $data): Server
    {
        $server->fill($data);
        $server->save();
        return $server;
    }

    public function delete(Server $server): bool
    {
        return $server->delete();
    }
}
