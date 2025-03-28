<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TransactionModel;

class TransactionsController extends Controller
{
    public function index($page = null) {

        $table_title = [
            'UPI/RRN',
            'Ammount',
            'Type',
            'Date',
            'Uploaded By',
        ];
        $limit          = 10;
        $data           = null;
        $count          = TransactionModel::count();
        $currentPage    = 1;

        $getRequest     = request()->all();

        if($page == null || $page == 1) {

            

            $data = TransactionModel::join('employee', 'transactions.upload_by', '=', 'employee.id')
                ->select('transactions.*', 'employee.fname as fname', 'employee.lname as lname', 'employee.mname as mname');

            if(isset($getRequest['search']) && $getRequest['search'] != '') {
                $data = $data->where('upi_rrn', (int)$getRequest['search']);
            }

            if(isset($getRequest['ammount']) && $getRequest['ammount'] != '') {
                $data = $data->where('ammount', (int)$getRequest['ammount']);
            }

            if(isset($getRequest['type']) && $getRequest['type'] != ''  && $getRequest['type'] != 3) {
                $data = $data->where('iscredit', $getRequest['type']);
            }

            if(isset($getRequest['from']) && $getRequest['from'] != '' && isset($getRequest['to']) && $getRequest['to'] != '') {
                $data = $data->whereDate('created_at', '>=', $getRequest['from'])->whereDate('created_at', '<=', $getRequest['to']);
            }
            
            $count      = $data->count();
            $pageCount  = floor($count / $limit);
            $data       = $data->limit($limit)->get();
        }
        else {


            $data = TransactionModel::join('employee', 'transactions.upload_by', '=', 'employee.id')
                ->select('transactions.*', 'employee.fname as fname', 'employee.lname as lname', 'employee.mname as mname');

            if (isset($getRequest['search']) && $getRequest['search'] != '') {
                $data = $data->where('upi_rrn', (int)$getRequest['search']);
            }

            if (isset($getRequest['ammount']) && $getRequest['ammount'] != '') {
                $data = $data->where('ammount', (int)$getRequest['ammount']);
            }

            if (isset($getRequest['type']) && $getRequest['type'] != '' && $getRequest['type'] != 3) {
                $data = $data->where('iscredit', $getRequest['type']);
            }

            if (isset($getRequest['from']) && $getRequest['from'] != '' && isset($getRequest['to']) && $getRequest['to'] != '') {
                $data = $data->whereDate('created_at', '>=', $getRequest['from'])->whereDate('created_at', '<=', $getRequest['to']);
            }

            $currentPage    = $page;
            $count          = $data->count();
            $pageCount      = floor($count / $limit);
            $data           = $data->limit($limit)->offset($page * $limit)->get();
            
        }

        return view('pages.transactions.view', 
            [   
                'active_link'   => 'transactions', 
                'table_title'   => $table_title, 
                'data'          => $data,
                'current_page'  => $currentPage,
                'count'         => $count,
                'filter'        => $getRequest,
                'page_count'    => $pageCount,
                'select'        => [
                    '1' => 'Credit',
                    '0' => 'Debit',
                ]
            ]
        );
    }

   

    public function upload(Request $request) {
        $data = $request->json()->all(); 

        if (!isset($data['transactions']) || !is_array($data['transactions'])) {
            return response()->json(['error' => 'Invalid data format'], 400);
        }

        try {
            TransactionModel::insert($data['transactions']); 
            return response()->json(['message' => 'Data uploaded successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
