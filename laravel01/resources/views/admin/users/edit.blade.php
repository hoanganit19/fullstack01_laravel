@extends('layouts.admin')
@section('content')
    <h1>Update user</h1>
    <form action="{{ route('admin.users.update', $id) }}" method="POST">
        <input type="text" name="name" placeholder="Name..." value="{{ $user->name }}" /> <br />
        <input type="text" name="email" placeholder="Email..." value="{{ $user->email }}" /> <br />
        <button type="submit">Submit</button>
        @csrf
        @method('PUT')
    </form>
@endsection
