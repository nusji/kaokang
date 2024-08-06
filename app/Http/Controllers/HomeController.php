<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // ตรวจสอบว่าผู้ใช้ต้องเข้าสู่ระบบก่อนเข้าถึงหน้า
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // ตรวจสอบบทบาทของผู้ใช้และเปลี่ยนเส้นทางตามบทบาท
        if ($user->employee_role === 'owner') {
            return view('home.owner', compact('user'));
        } elseif ($user->employee_role === 'employee') {
            return view('home.employee', compact('user'));
        } else {
            return abort(403, 'การเข้าถึงไม่ได้รับอนุญาติ');
        }
    }

    public function owner(){
        $user = Auth::user();
        if ($user->employee_role === 'owner') {
            return view('home.owner', compact('user'));
        } else {
            return abort(403, 'การเข้าถึงไม่ได้รับอนุญาติ');
        }
    }

    function employee(){
        $user = Auth::user();
        if ($user->employee_role === 'employee') {
            return view('home.employee', compact('user'));
        } else {
            return abort(403, 'การเข้าถึงไม่ได้รับอนุญาติ');
        }
    }
}
