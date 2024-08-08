<?php
// app/Models/Employee.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable; // เปลี่ยนจาก Model เป็น Authenticatable
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable // เปลี่ยนจาก Model เป็น Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_role',
        'address',
        'tel',
        'username',
    ];

}

