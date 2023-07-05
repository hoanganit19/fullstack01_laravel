@extends('layouts.admin')
@section('content')
    <x-alert data-type="error" message="Thêm thành công" />
    <h1>{{ $pageTitle }}</h1>
    <h2>@now</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $users->links() !!}
@endsection
