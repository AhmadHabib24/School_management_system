@extends('layout/layout')

@section('space-work')
    <h2 class="mb-4">Manage Permission</h2>

    <form action="{{ route('updatepermission') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-2">
                <label for="">Select User</label>
            </div>
            <div class="col-md-4">
                <select name="user_id" required class="form-control" style="border: 1px solid;">
                    <option value="">Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2">
                <label for="">Select Permission</label>
            </div>
            <div class="col-md-4">
                <select name="confirmation" required class="form-control" id="confirmation" style="border: 1px solid;">
                    <option value="" disabled selected>Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

            </div>
        </div>
        <input type="submit" value="Update Permission" class="btn btn-primary">
    </form>
@endsection
