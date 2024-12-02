@extends('includes.layout')
@section('main')
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">tasks</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">tasks</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb -->

    <!-- Container fluid -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All tasks</h5>
                        <div class="table-responsive">
                           <form id="task-filter-form" action="{{ route('tasks.index') }}" method="GET">
                            @csrf
                            <label for="month">Select Month:</label>
                            <select name="month" id="month" onchange="filterTasks()">
                                <option value="01" {{ $month == '01' ? 'selected' : '' }}>January</option>
                                <option value="02" {{ $month == '02' ? 'selected' : '' }}>February</option>
                                <option value="03" {{ $month == '03' ? 'selected' : '' }}>March</option>
                                <option value="04" {{ $month == '04' ? 'selected' : '' }}>April</option>
                                <option value="05" {{ $month == '05' ? 'selected' : '' }}>May</option>
                                <option value="06" {{ $month == '06' ? 'selected' : '' }}>June</option>
                                <option value="07" {{ $month == '07' ? 'selected' : '' }}>July</option>
                                <option value="08" {{ $month == '08' ? 'selected' : '' }}>August</option>
                                <option value="09" {{ $month == '09' ? 'selected' : '' }}>September</option>
                                <option value="10" {{ $month == '10' ? 'selected' : '' }}>October</option>
                                <option value="11" {{ $month == '11' ? 'selected' : '' }}>November</option>
                                <option value="12" {{ $month == '12' ? 'selected' : '' }}>December</option>
                            </select>
                        
                            <label for="path_id">Select Path:</label>
                            <select name="path_id" id="path_id" onchange="filterTasks()">
                                <option value="">All Paths</option>
                                @foreach($paths as $path)
                                    <option value="{{ $path->id }}" {{ $path_id == $path->id ? 'selected' : '' }}>
                                        {{ $path->name }}
                                    </option>
                                @endforeach
                            </select>
                             </form>
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Student</th>
                                      <th>Path</th>
                                      <th>Due Date</th>
                                      <th>Month</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->student->name_en }}</td>
                                        <td>{{ $task->path->name ?? 'n/a' }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>{{ $task->month }}</td>
                                         <td>{{ ucfirst($task->status) }}</td>
                                        <td>
                                           <form action="{{ route('tasks.update', $task) }}" method="POST">
                                             @csrf
                                             @method('PUT')
                                             <select name="status" onchange="this.form.submit()">
                                                 <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                 <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                             </select>
                                         </form>
                                     </td>
                                     <td>
                                        <a href="{{ route('tasks.edit',$task->id)}}  "class="btn btn-success" style="display: inline">edit</a>
                                        <form action="{{ route('tasks.delete', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="display: inline" >Delete</button>
                                        </form>
                                     </td>
                                 </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
    <!-- End Container fluid -->
</div>
@endsection
<script>
    function filterTasks() {
    document.getElementById('task-filter-form').submit();
}

</script>
   