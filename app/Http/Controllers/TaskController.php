<?php

namespace App\Http\Controllers;

use App\Services\TaskHandlerService;
use App\Http\Requests\TaskRequest;
use App\Traits\HandlerRequest;

class TaskController extends Controller
{
    use HandlerRequest;

    protected $taskHandlerService;

    public function __construct(TaskHandlerService $taskHandlerService)
    {
        $this->taskHandlerService = $taskHandlerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->handleRequest(function () {
            return $this->taskHandlerService->renderTaskList(request());
        }, "Erro ao recuperar os dados");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        return $this->handleRequest(function () use ($data) {
            return $this->taskHandlerService->createTaskAndRedirect($data);
        }, "Erro ao criar a Task");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->handleRequest(function () use ($id) {
            return $this->taskHandlerService->renderTaskDetails($id);
        }, "Erro ao recuperar a Task");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {
        $data = $request->validated();
        return $this->handleRequest(function () use ($data, $id) {
            return $this->taskHandlerService->updateTaskAndRedirect($id, $data);
        }, "Erro ao atualizar a Task");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->handleRequest(function () use ($id) {
            return $this->taskHandlerService->deleteTaskAndRedirect($id);
        }, "Erro ao deletar a tarefa");
    }
}
