<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Task;

class TaskController extends Controller
{

    private $task;

    public function __construct(TaskRepository $task)
   {
       $this->task = $task;
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::updateOrCreate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $numeroConta
     * @return \Illuminate\Http\Response
     */
    public function show($numeroConta)
    {
        $task = $this->task->show($numeroConta);
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all(){
        return $this->task->all();
    }

    public function sacar($numConta, $valor) {
        return $this->conta->sacar($numConta, $valor);
    }

    public function depositar($numConta, $valor) {
        return $this->conta->depositar($numConta, $valor);
    }

}
