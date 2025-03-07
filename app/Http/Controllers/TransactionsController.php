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
            'Amount',
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

        $request->validate([
            'file' => 'required|mimes:txt',
        ]);
        $filePath = $request->file('file')->store('bankstatements', 'public');

        $fileContents = Storage::disk('public')->get($filePath);

        $lines = explode("\n", $fileContents);
        $transactions = [];
        $upiRrn = null;
        $count = 0;
        foreach ($lines as $line) {
            if (preg_match('/UPI\/RRN\s+(\d+)/', $line, $matches)) {
                $upiRrn = $matches[1];
            }

            if (preg_match('/BY TRF\.\s+([\d,]+\.\d{2})/', $line, $matches) && $upiRrn) {
                $creditAmount = str_replace(',', '', $matches[1]);


                TransactionModel::create([
                    'upi_rrn' => $upiRrn,
                    'amount' => $creditAmount
                ])->save();


                $transactions[] = ['upi_rrn' => $upiRrn, 'credit' => $creditAmount];
                $upiRrn = null;
                $count++;
            }
        }

        return back()->with('success', "File uploaded successfully. $count transactions found.");
    }
}
