<?php

namespace App\Http\Controllers;

use App\Helpers\ApiGamesHelper;
use App\Models\TopUp;
use Illuminate\Http\Request;

class DepositController extends Controller
{

    public function depositView()
    {
        return view('admin.deposit.index');
    }

    public function depositSaldo(Request $request)
    {
        try {
            \DB::beginTransaction();
            $apiGames = new ApiGamesHelper();
            $apiGames->deposit($request->amount);
            TopUp::create([
                'amount' => $request->amount,
                'note' => 'TopUp Via BCA'
            ]);
            \DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            \DB::rollBack();
            return $th->getMessage();
        }
    }
}