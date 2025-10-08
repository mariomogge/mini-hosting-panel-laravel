<?php
namespace App\Contracts;

use App\Models\Server;

interface ServerServiceInterface
{
    public function createForUser(array $data, int $userId): Server;
    public function start(Server $server): Server;
    public function stop(Server $server): Server;
}
