@extends('admin.index')

@push('css')
<link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
@endpush

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form action="/admin/user/{{ $user->id }}/edit" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <img src="{{ asset('storage/' . $user->image) }}" alt="" class="d-block rounded" style="max-height: 250px;">
                        @error('image')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" disabled value={{ old('name') ?? $user->name
                        }}>
                        @error('name')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Deksripsi</label>
                        <input type="email" class="form-control" name="email" disabled value={{ old('email') ??
                            $user->email }}>
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <div class="form-group">
                            <label class="custom-switch mt-2 p-0">
                                <input type="checkbox" id="switch" name="status" class="custom-switch-input"
                                    value="false">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Approved ?</span>
                            </label>
                        </div>
                        @error('image')
                        <p>{{ $message }}</p>
                        @enderror
                    </div> --}}
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var switchStatus = false;
    $("#switch").on('change', function() {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            document.getElementById('switch').value = switchStatus
            // alert(switchStatus);
        }
        else {
        switchStatus = $(this).is(':checked');
        document.getElementById('switch').value = switchStatus
        //  alert(switchStatus);
        }
    });
</script>
@endpush
