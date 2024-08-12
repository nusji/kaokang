<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeProfileCompletion
{
    public function handle(Request $request, Closure $next): Response
    {
        // ตรวจสอบว่าผู้ใช้ล็อกอินอยู่และเป็นพนักงาน
        if (auth()->check() && auth()->user()->is_employee && !auth()->user()->is_profile_complete) {
            return redirect()->route('employees.completeProfile');
        }

        return $next($request);
    }
}
