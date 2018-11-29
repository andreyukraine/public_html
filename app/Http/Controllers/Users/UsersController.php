<?php

namespace App\Http\Controllers\Users;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if(Auth::user()){
            $search = $request->get('search');
            $user = Auth::user()->name;
            $tasks_mass = Task::with('tasks')->where('user_task',$user);

            $tasks_open = Task::with('tasks')->where('user_task',$user)->where('status','open')->orderBy('created_at', 'desc')->get();
            $tasks_close = Task::with('tasks')->where('user_task',$user)->where('status','close')->orderBy('created_at', 'desc')->get();

            if($request->ajax()){

                $row_task = "";
                $title = "";

                if ($request->status == 'all') {
                    $title = "All";
                    $output = $tasks_mass->get();
                }elseif($request->status == 'open'){
                    $title = "Open";
                    $output = $tasks_open;
                }elseif($request->status == 'close'){
                    $title = "Close";
                    $output = $tasks_close;
                }
                    if (count($output) > 0) {
                        foreach ($output as $task) {
                            $row_task .= '<tr>' .
                                '<td>' . $task->id . '</td>' .
                                '<td>' . $task->title . '</td>' .
                                '<td>' . $task->task_manager . '</td>' .
                                '<td>' . $task->descriptions . '</td>' .
                                '<td>' . $task->status . '</td>' .
                                '<td>' . $task->user_task . '</td>' .
                                '<td>' . $task->created_at->format('d-m-Y H:i') . '</td>' .
                                '<td>' .
                                '<a href="' . route('tasks.show', $task->id) . '"><span class="glyphicon glyphicon-eye-open"></span></a>' .
                                '<a href="' . route('tasks.edit', $task->id) . '"><span class="glyphicon glyphicon-pencil"></span></a>' .
                                '</td>' .
                                '</tr>';
                        }
                    }
                    $output = array([
                        'title'=> $title.' task',
                        'tasks'=> $row_task,
                    ]);

                return Response($output);
            }

            if($request->get('search')) {
                $tasks = Task::with('tasks')->where('user_task', $user)->where('title', 'like', '%' . $search . '%')->get();
            }else{
                $tasks = Task::with('tasks')->where('user_task',$user)->where('status','open')->orderBy('created_at', 'desc')->get();
            }
            return view('users.home',[
                'tasks' => $tasks,
                'count_tasks_open' => count($tasks_open),
                'count_all_tasks' => count($tasks_mass->get()),
                'count_tasks_close' => count($tasks_close),
                'search' => $search
            ]);
        }
    }
    public function store(Request $request){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);

    }
    protected function create()
    {
        return view('admin.users.create');
    }
}
