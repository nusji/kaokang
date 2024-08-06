<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee; // เปลี่ยนเป็น Employee ถ้าใช้ Employee model
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'], // เปลี่ยนเป็น employees ถ้าใช้ Employee model
            'password' => ['required', 'string', 'min:8', 'confirmed'], // คุณอาจต้องการลบการตรวจสอบนี้
            'employee_role' => ['required', 'in:owner,employee'], // ตรวจสอบค่า role
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Employee // เปลี่ยนเป็น Employee ถ้าใช้ Employee model
     */
    protected function create(array $data)
    {
        return Employee::create([ // เปลี่ยนเป็น Employee ถ้าใช้ Employee model
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // ไม่ใช้ Hash::make()
            'employee_role' => $data['employee_role'], // บันทึก role ที่เลือก
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function registered(Request $request, $user)
    {
        if ($user->employee_role === 'owner') {
            return redirect()->route('owner.home');
        } else {
            return redirect()->route('employee.home');
        }
    }
}
