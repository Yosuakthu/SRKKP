<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomRequests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('nelayan')->user();

        // Ambil permohonan berdasarkan user yang login
        $permohonan = RekomRequests::where('user_id', $user->id)->latest()->get();

        return view('dashboard', compact('permohonan'));
    }
}
