<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
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
        $userId = Auth::id();
        $validatedData['user_id'] = $userId;

        Reservation::create($validatedData);

        return redirect()->route("reservations.index")->with("success", "予約が完了しました!");
    }
}
