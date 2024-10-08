@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- แสดงชื่อของ user ที่เข้าสู่ระบบ -->
                    <h2>สวัสดี เจ้าของร้าน คุณ {{ Auth::user()->name }}.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
