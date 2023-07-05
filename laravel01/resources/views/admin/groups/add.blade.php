<form action="{{ route('admin.groups.store') }}" method="post">
    <div>
        <input type="text" name="name" />
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Add</button>
    @csrf
</form>
