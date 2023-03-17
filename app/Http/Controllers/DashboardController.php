<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // if (!session('nisn')) {
        //     return redirect('login');
        // }

        return view('admin.dashboard', [
            'header' => 'SPP | Dashboard',
            'titleCard' => 'History Pembayaran Saya',
            'collection' => Pembayaran::where('nisn', session('nisn'))->get()
        ]);
    }
}
