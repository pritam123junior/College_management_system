@extends('admin.layouts.app')
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
                  <div class="progress bg-soft-danger shadow-none w-100" style="height: 6px">
                     
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
                     0%
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <i class="bi bi-people-fill"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                     <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
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
                     26.84%
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <i class="bi bi-card-list"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="progress bg-soft-success shadow-none w-100" style="height: 6px">
                     <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                     26.84%
                  </div>
                  <div class="border  bg-soft-primary rounded p-3">
                     <i class="bi bi-list-ul"></i>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="progress bg-soft-primary shadow-none w-100" style="height: 6px">
                     <div class="progress-bar bg-primary" data-toggle="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>   
     
      
     
   </div>  
</div>


@endsection
