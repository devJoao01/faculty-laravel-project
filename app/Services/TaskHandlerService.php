<?php

namespace App\Services;

use App\Http\Resources\TaskResource;
use Illuminate\Http\Request;

class TaskHandlerService
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function renderTaskList(Request $request)
    {
        $tasks = $this->taskService->all();
        $formattedTasks = TaskResource::collection($tasks);
        return view('task.index', compact('formattedTasks'));
    }

    public function renderTaskDetails($id)
    {
        $task = $this->taskService->find($id);
        return view('task.show', compact('task'));
    }

    public function createTaskAndRedirect($data)
    {
        $task = $this->taskService->create($data);
        return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task Criada com Sucesso');
    }

    public function updateTaskAndRedirect($id, $data)
    {
        $task = $this->taskService->update($id, $data);
        return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task Atualizada com Sucesso');
    }

    public function deleteTaskAndRedirect($id)
    {
        $this->taskService->delete($id);
        return redirect()->route('tasks.index')->with('success', 'Tarefa deletada com sucesso');
    }
}
