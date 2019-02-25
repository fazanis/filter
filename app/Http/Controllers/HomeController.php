<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.02.2019
 * Time: 15:12
 */

namespace App\Http\Controllers;


use App\Task;
use Illuminate\Http\Request;
use App\Filter;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function home()
    {
        $tasks = Task::all();
        return view('welcome',compact(
            'tasks'
        ));
    }

    public function ajax(Request $request)
    {
        $tasks = DB::table('tasks');
        $tasks = (new Filter($tasks,$request))->apply()->get();
        return $tasks;
//        return view('welcome',compact(
//            'tasks'
//        ));

    }

}