@extends('admin.layouts.app')

@section('content')
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Class 1 Content</h4>                   
               </div>
                <a href="{{ route('teacher.content.add', ['id' => 1]) }}" class="btn btn-primary">Add Content</a> 
            </div>
            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table table-striped mb-0" role="grid">
                     <thead>
                                       <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Sections</th>
                                    <th>Actions</th>
                                </tr>
                     </thead>
                     <tbody>
                         @foreach($classes as $index => $class)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $class->name }}</td>
                    <td><span class="badge bg-{{ $class->status == 'active' ? 'success' : 'danger' }}">{{ ucfirst($class->status) }}</span></td>
                    <td>
                      null
                    </td>
                    <td>
                        <a href="{{ route('admin.classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.classes.delete', $class->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this class?')">Delete</button>
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
@endsection
