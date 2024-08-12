<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        $employee = \App\Models\Employee::where('email', $credentials['email'])->first();

        if ($employee && $employee->password === $credentials['password']) {
            $this->guard()->login($employee, $request->filled('remember'));
            return true;
        }

        return false;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->employee_role === 'owner') {
            return redirect()->route('home.owner');
        } elseif ($user->employee_role === 'employee') {
            return redirect()->route('home.employee');
        }

        // ตรวจสอบเส้นทางนี้ด้วย
        return redirect('/home');
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login'); // เปลี่ยนเส้นทางไปที่หน้าล็อกอินหลังจากล็อกเอาท
    }

    protected function sendFailedLoginResponse(Request $request)
{
    // ส่ง Flash Message กลับไป
    return redirect()->back()->with('error', 'ไม่พบผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง');
}

}
