@extends('teacher.layouts.app')
@section('content')
    <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Basic Table</h4>
               </div>
            </div>
            <div class="card-body p-0">
               <div class="table-responsive mt-4">
                  <table id="basic-table" class="table table-striped mb-0" role="grid">
                     <thead>
                        <tr>
                           <th>Sl.</th>
                           <th>Class Name</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>
                              1
                           </td>
                           <td>
                              one
                           </td>
                           <td>
                           <a href="{{ route('teacher.content.index', ['id' => 1]) }}" class="btn btn-primary">View Content</button>                          
                           </td>                       
                        </tr>                  
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
