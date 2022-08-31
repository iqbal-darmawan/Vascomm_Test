@extends('admin.index')

@section('content')

<h1>List User</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">status</th>
            <th scope="col">Picture</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $index => $user)
        <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->is_approved == true)
                <p class="text-success">Approved</p>
                @else
                <p class="text-warning">Not Approved</p>
                @endif
            </td>
            <td>
                <img src="{{ asset('storage/' . $user->image) }}" alt="" class="w-100 rounded"
                    style="max-width: 100px;">
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="/admin/user/{{ $user->id }}/edit" class="btn btn-warning">edit</a>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
