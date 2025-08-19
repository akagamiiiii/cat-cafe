<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Store;
use App\Http\Requests\StoreReservationRequest;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reservations.index");
    }

    public function store(StoreReservationRequest $request)
    {
        //バリデーションデータの取得
        $validatedData = $request->validated();

        return redirect()->route("reservations.index")->with("success", "予約が完了しました!");
    }
}
