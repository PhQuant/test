<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\String\b;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(CreateTask $request){

        $checkTask = Task::where('user_id', Auth::user()->id)->where('end', '>=', $request['start'])->where('is_completed', 0)->count();
        if($checkTask < 4){
            $file = $request->file('file')->store('public');
            $file = Storage::url($file);

            Task::create([
                'topic' => $request['topic'],
                'user_id' => Auth::user()->id,
                'description' => $request['description'],
                'start' => $request['start'],
                'end' => $request['end'],
                'file' => $file
            ]);
            return back()->withInput(['success' => 'Вы успшено создали задачу']);
        } else {
            return back()->withErrors(['many' => 'У вас пересекаются 4 задачи!']);
        }
    }

    public function completed(Task $task){
        if(Auth::user()->is_admin == 1){
            $task->update(['is_completed' => 1]);
            return back();
        } else {
            return back()->withErrors(['error' => 'Недостаточно прав']);
        }
    }

}
