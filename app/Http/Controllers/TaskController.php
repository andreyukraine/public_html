<?php

namespace App\Http\Controllers;

use App\Category;
use App\File;
use App\Task;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {

        $user  = Auth::user()->name;
        $searchByStatus = $request->get('status');
        $searchBy = $request->get('search');
        $searchUser = $request->get('user');
        $tasks_mass = Task::with('tasks');
        $users = User::all();

        $categories = Category::where('parent_id', '=', 0)->get();

        //$allCategories = Category::pluck('name','id')->all();

        if (!empty($searchUser)) {
            $user = $searchUser;
        }
        if (!empty($searchByStatus)) {
                $tasks_mass = $tasks_mass->where('user_task', $user)->whereStatus($searchByStatus);
        }
        if (!empty($searchBy)) {
                $tasks_mass = $tasks_mass->where('user_task', $user)->where('title', 'like', '%' . $searchBy . '%');
        }
        if (!empty($request->id)){
           // $tasks_mass = $tasks_mass->where('user_task', $user)->where('category_id', $request->id);
        }

        $output ="";
        if($request->ajax()){
            if ($request->id) {
                $tasks_mass = Category::find($request->id)->tasks()->get();
                if (count($tasks_mass->all()) > 0) {
                    foreach ($tasks_mass as $task) {
                        $output .= '<tr>' .
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
                            '<a href="' . route('delete.task', $task->id) . '"><span class="glyphicon glyphicon-remove"></span></a>' .
                            '</td>' .
                            '</tr>';
                    }
                    return Response($output);
                }
                $output .= '<tr><td>Not tasks</td></tr>';
                return Response($output);
            }
        }

        return view('task.index', [
            'tasks' => $tasks_mass->paginate(10),
            'search' => $searchBy,
            'status' => $searchByStatus,
            'users'=> $users,
            'categories'=> $categories,
            //'ajax' => Response::json($out)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status= DB::table('status')->get();
        $categories = Category::all();
        return view('task.create', ['categories' => $categories, 'status'=> $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();

        $categories = Category::all();
        $messages = [
            'title' => 'Необходимо указать Task title',
            'task_manager' => 'fffff',
            'descriptions' => 'dddddd'
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'task_manager' => 'required|max:255',
            'descriptions' =>'max:255'
        ],$messages);

        //dd($validator->messages());
        if ($validator->fails()) {
            return view('task.create', ['categories' => $categories, 'validator'=>$validator]);
        }else{
            if ($request->hasFile('file')){
                //dd($request);
            }
            $task->title = $request->title;
            $task->user_task = Auth::user()->name;
            $task->status = 'open';
            $task->task_manager = $request->task_manager;
            $task->descriptions = $request->task_description;
            $task->slug = $request->title;

            $task->save();

            foreach ($request->cat_id as $cat_item) {
                $cat = Category::find($cat_item);
                $task->categories()->attach($cat);
            }
       }

        if (Auth::user()->role == 1) {
            Session::flash('message', 'Successfully create!');
            return redirect('/tasks');
        }else{
            Session::flash('message', 'Successfully create!');
            return redirect('/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('task.view', ['task'=> $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id, Request $request)
    {
        $categories = Category::all();
        $task = Task::find($id);
        $status = DB::table('status')->get();
        $files = $task->files()->get()->all();

        if($request->ajax()){
            $output = "";
            $file = File::find($request->id);
            $task->files()->detach($file);
            Storage::delete($file);
            $file->delete();
            $files = $task->files()->get()->all();
            if (count($files) > 0) {
                foreach ($files as $file) {
                    $output .= '<p><a href="' . $file->url . '" download>' . $file->name . '</a> <i id="dow_file" data-title="' . $file->id . '">x</i> </p>';
                }
            }else{
                $output .= '<p>нет файлов</p>';
            }
            return Response($output);
        }

        $select_category = $task->categories()->get()->all();
        return view('task.edit', [
            'task'=> $task,
            'categories'=> $categories,
            'select_category' => $select_category,
            'status' => $status,
            'files'=>$files
            ]
        );
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

        $task = Task::find($id);
        $task->title = $request->title;
        $task->task_manager = $request->task_manager;
        $task->status = $request->status;
        $task->descriptions = $request->task_description;
        $task->categories()->detach();
        $task->save();


        if ($request->hasFile('file')){
            //$filename = $request->file->getClientOriginalName();
            $dt = new DateTime();
            $data_now = $dt->format('Y_m_d');
            $filename = $data_now.'_'. $request->file->getClientOriginalName();
            $filesize = $request->file->getClientSize();
            $request->file->storeAs('public/upload', $filename);
            $file = new File();
            $file->name = $filename;
            $file->size = $filesize;
            $file->url = Storage::url($filename);
            $file->save();
            $task->files()->attach($file);
        }


        foreach ((array)$request->cat_id as $cat_item) {
            $cat = Category::find($cat_item);
            $task->categories()->attach($cat);
        }


        if(Auth::user()->role){
            Session::flash('message', 'Successfully update!');
            return redirect('/tasks');
        }else{
            Session::flash('message', 'Successfully create!');
            return redirect('/users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role == 1) {
            $task = Task::find($id);
            $task->categories()->detach();
            //удали файлы
            $files_mass = $task->files()->get()->all();
            foreach ($files_mass as $file){
                Storage::delete($file);
            }
            //удаляем с таблицы
            $task->files()->detach();

            $task->delete();
            Session::flash('message', 'Successfully delete!');
            return redirect('/tasks');
        }
        return redirect('/tasks');
    }

    public function uploadFile(){

    }

}
