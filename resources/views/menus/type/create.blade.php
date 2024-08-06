@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('menus.type.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="menu_type_name">Menu Type Name</label>
            <input type="text" name="menu_type_name" id="menu_type_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="menu_type_detail">Menu Type Detail</label>
            <input type="text" name="menu_type_detail" id="menu_type_detail" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Add Menu Type</button>
    </form>
</div>
@endsection
