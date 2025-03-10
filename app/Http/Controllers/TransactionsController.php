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
        ];
        $limit          = 10;
        $data           = null;
        $count          = TransactionModel::count();
        $currentPage    = 1;

        if($page == null) {
            $data = TransactionModel::limit($limit)->get();
        }
        else {
            $data = TransactionModel::limit($limit)->offset($page * $limit)->get();
            $currentPage = $page;
        }

        return view('pages.transactions.view', 
            [   
                'active_link'   => 'transactions', 
                'table_title'   => $table_title, 
                'data'          => $data,
                'current_page'  => $currentPage,
                'count'         => $count,
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
