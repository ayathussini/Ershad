@extends('includes.layout')

@section('main')
<div class="container mt-4">
    <h2>Trashed Students</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name (Arabic)</th>
                <th>Name (English)</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>City</th>
                <th>University</th>
                <th>Faculty</th>
                <th>Nationality</th>
                <th>Training Path</th>
                <th>Personality Test Results</th>
                <th>English Level Test Results</th>
                <th>Deleted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name_ar }}</td>
                    <td>{{ $student->name_en }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender == 'm' ? 'Male' : 'Female' }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->city }}</td>
                    <td>{{ $student->university }}</td>
                    <td>{{ $student->faculty }}</td>
                    <td>{{ $student->nationality }}</td>
                    <td>{{ $student->training_path }}</td>
                    <td>{{ $student->personality_test_results }}</td>
                    <td>{{ $student->english_level_test_results }}</td>
                    <td>{{ $student->deleted_at }}</td>
                    <td>
                        <!-- Restore Button -->
                        <form action="{{ route('student.restore', $students->id) }}" method="get" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-success">Restore</button>
                        </form>

                        <!-- Force Delete Button -->
                        <form action="{{ route('student.forceDelete', $students->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="17" class="text-center">No trashed students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
