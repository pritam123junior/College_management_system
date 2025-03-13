@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add Content</h4>
                    </div>
                </div>
                <div class="card-body">                    
                    <form action="{{ route('admin.content.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control" required>
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="course_id" class="form-label">Course</label>
                            <select name="course_id" id="course_id" class="form-control" required>
                                <option value="">Select Course</option>                                
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="file_content" class="form-label">File Upload(max:50MB)</label>
                            <input type="file" name="file_content" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="submit" class="btn btn-danger">cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
$(document).ready(function(){

$( "#class_id" ).on( "change", function() {

$( "#course_id" ).html( "" );
$( "#course_id" ).html( '<option value="">Select Course</option>' );

 $.ajax({
            
            url: "{{route('admin.ajaxdata.course')}}",
            type: "POST",
           data:{
                _token:"{{ csrf_token() }}",
                class_id:$("#class_id option:selected").val()
            },
            success:function(data){
                for(const item of data){
                    let html_code='<option value="'+item.id+'">'+item.name+'</option>';
                    $( "#course_id" ).append(html_code);
                }
            }
            
        });

} ); 
} ); 

</script>
@endpush