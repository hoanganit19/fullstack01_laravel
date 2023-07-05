@extends('layouts.admin')
@section('content')
    <h1>Thêm user</h1>
    <form action="{{ route('admin.users.store') }}" class="form-add" method="POST">
        <div>
            <input type="text" name="name" placeholder="Name..." value="{{ old('name') }}" />
            <br />
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <button type="submit">Submit</button>
        @csrf
    </form>
@endsection
{{-- @section('scripts')
    <script>
        const formAdd = document.querySelector('.form-add');
        formAdd.addEventListener('submit', e => {
            e.preventDefault();
            const action = e.target.action;
            const data = {
                name: e.target.querySelector('[name="name"]').value,
                _token: e.target.querySelector('[name="_token"]').value
            }

            fetch(action, {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify(data)
                }).then(res => res.json())
                .then(data => {
                    console.log(data);
                });
        })

        const a = `Xin chào @{{ name }}`
    </script>
@endsection --}}
