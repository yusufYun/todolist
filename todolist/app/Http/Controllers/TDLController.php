<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TDLController extends Controller
{
    public function todolist()
    {
        if(!isset(Auth::user()->id))
            return view('index');
        //$tasks = Task::all_tasks();
        $tasks = Task::where('user_id','=',Auth::user()->id)->get();
        $tab_num = 0;
        return view('index', ['tasks' => $tasks, 'tab_num' => $tab_num]);
    }

    public function tasks($tab_num)
    {
        if(!isset(Auth::user()->id))
            return view('index');

        if ($tab_num != 1 && $tab_num != 2)
            return redirect('/');

        if ($tab_num == 1)
            $tasks = Task::where('user_id','=', Auth::user()->id)
                            ->where('state','!=','completed')->get();
        else
            $tasks = Task::where('user_id','=', Auth::user()->id)
                            ->where('state','=','completed')->get();
        return view('index', ['tasks' => $tasks, 'tab_num' => $tab_num]);
    }

    public function addtask()
    {
        if(!isset(Auth::user()->id))
            return redirect('/');
        $task_desc = strip_tags($_POST['task_desc']);
        Task::create(array('description' => $task_desc,
                            'state' => 'in_expect',
                            'user_id' => Auth::user()->id));
        return redirect('/');
    }

    public function deltask($id)
    {
        if(!isset(Auth::user()->id))
            return redirect('/');
        $task = Task::find($id);
        if ($task->user->id == Auth::user()->id)
            $task->delete();

        return redirect('/');
    }

    public function registration()
    {
        $register = true;
        return view('index', ['register' => $register]);
    }

    public function changeState(Request $request, $id)
    {
        $state = strip_tags($request->state);

        if(!isset(Auth::user()->id))
            return redirect('/');
        $task = Task::find($id);
        if ($task->user->id == Auth::user()->id)
        {
            $task->state=$state;
            $task->save();
        }

        return redirect('/');
    }
}