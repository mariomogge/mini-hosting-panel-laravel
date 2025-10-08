<?php
namespace App\Contracts;

use App\Models\Server;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ServerRepositoryInterface
{
    public function findById(int $id): ?Server;
    public function findAllForUser(int $userId, int $perPage = 15): LengthAwarePaginator;
    public function findAll(int $perPage = 15): LengthAwarePaginator;
    public function create(array $data): Server;
    public function update(Server $server, array $data): Server;
    public function delete(Server $server): bool;
}
