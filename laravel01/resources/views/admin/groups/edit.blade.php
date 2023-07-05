@if (session('msg'))
    <div style="color: red">{{ session('msg') }}</div>
@endif
<form action="{{ route('admin.groups.update', $group) }}" method="post">
    <div>
        <input type="text" name="name" value="{{ $group->name }}" />
    </div>
    <div>
        <textarea name="description" id="" cols="30" rows="10">{{ $group->description }}</textarea>
    </div>
    <button type="submit">Update</button>
    @csrf
    @method('PUT')
</form>
