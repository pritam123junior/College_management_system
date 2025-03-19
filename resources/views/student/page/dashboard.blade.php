@extends('student.layouts.app')
@section('content')

<div>
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Content</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalContents }}</h2>
                     
                  </div>
                  <div class="border  bg-soft-info rounded p-3">
                     <i class="bi bi-file-earmark-fill"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class=" shadow-none w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Teacher</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                        <h2 class="counter">{{ $totalTeachers }}</h2>
                     26.84%
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <i class="bi bi-people-fill"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class=" shadow-none w-100" style="height: 6px">
                   
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
                  <div class="border bg-soft-primary rounded p-3">
                     <i class="bi bi-list-ul"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="shadow-none w-100" style="height: 6px">
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
       
     
      
     
   </div>  
</div>


@endsection
