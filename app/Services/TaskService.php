<?php

namespace App\Services;

use App\Models\Task;

class TaskService implements ServiceInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }

    public function update(int $id, array $data)
    {
        $Tasks = Task::findOrFail($id);
        $Tasks->update($data);
        return $Tasks;
    }

    public function delete(int $id)
    {
        $Tasks = Task::findOrFail($id);
        $Tasks->delete();
    }

    public function find(int $id)
    {
        return Task::findOrFail($id);
    }

    public function all()
    {
        return Task::all();
    }
}
