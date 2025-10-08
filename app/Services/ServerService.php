<?php
namespace App\Services;

use App\Contracts\ServerRepositoryInterface;
use App\Contracts\ServerServiceInterface;
use App\Models\Server;
use Illuminate\Support\Arr;

class ServerService implements ServerServiceInterface
{
    public function __construct(private ServerRepositoryInterface $repo) {}

    public function createForUser(array $data, int $userId): Server
    {
        $data['owner_id'] = $userId;
        $data['status'] = $data['status'] ?? 'stopped';
        $data['meta'] = $data['meta'] ?? [];
        return $this->repo->create($data);
    }

    public function start(Server $server): Server
    {
        // Example hook: Provisioning check, rate-limit checks, audits, job dispatch, etc.
        $server->status = 'running';
        return $this->repo->update($server, ['status' => 'running']);
    }

    public function stop(Server $server): Server
    {
        $server->status = 'stopped';
        return $this->repo->update($server, ['status' => 'stopped']);
    }
}
