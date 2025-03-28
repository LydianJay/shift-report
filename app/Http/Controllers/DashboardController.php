<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index() {


        $table              = [];
        $table['date']      = [];
        $table['count']     = [];
        $table['ammount']   = [];


        for ($i = 0; $i < 7; $i++) {
            $date       = Carbon::now()->subDays($i);
            $count      = TransactionModel::whereDate('created_at', $date)->count();
            $ammount    = TransactionModel::whereDate('created_at', $date)->sum('ammount');
            array_push($table['date'], $date->format('Y-m-d'));
            array_push($table['count'], $count);
            array_push($table['ammount'], $ammount);
        }


        $data = [
            'total'         => TransactionModel::whereDate('created_at', Carbon::today())->count(),
            'credit'        => TransactionModel::where('iscredit', '1')->whereDate('created_at', Carbon::today())->count(),
            'debit'         => TransactionModel::where('iscredit', '0')->whereDate('created_at', Carbon::today())->count(),
            'ammount'       => TransactionModel::whereDate('created_at', Carbon::today())->sum('ammount'),
            'table'         => $table,
            'today'         => date('r'),
        ];
        
        return view('pages.dashboard', ['active_link' => 'dashboard', 'data' => $data]);
    }
}
