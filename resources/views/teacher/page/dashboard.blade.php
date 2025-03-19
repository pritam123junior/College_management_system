@extends('teacher.layouts.app')
@section('content')

<div>
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Student</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalStudents }}</h2>
                    
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                     <i class="bi bi-people-fill"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total content</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                        <h2 class="counter">{{ $totalContent }}</h2>
                     
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <i class="bi bi-file-earmark-fill"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Class</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                        <h2 class="counter">{{ $totalClasses }}</h2>
                     
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <i class="bi bi-card-list"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Course</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                       <h2 class="counter">{{ $totalCourses }}</h2>
                     
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                     <i class="bi bi-list-ul"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>   
     
      
     
   </div>  
</div>


@endsection
