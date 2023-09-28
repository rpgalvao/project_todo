<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->date) {
            $filteredDate = $request->date;
        } else {
            $filteredDate = date('Y-m-d');
        }
        
        $data['tasks'] = Task::whereDate('due_date', $filteredDate)->get();

        $carbonDate = Carbon::create($filteredDate);
        $data['date_string'] = $carbonDate->translatedFormat('d').' de '.ucfirst($carbonDate->translatedFormat('M'));
        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        $data['tasks_count'] = $data['tasks']->count();
        $data['tasks_undone'] = $data['tasks']->where('is_done', false)->count();

        return view('home', $data);
    }
}
