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
                     26.84%
                  </div>
                  <div class="border  bg-soft-danger rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                     </svg>
                  </div>
               </div>
               <div class="mt-4">
                  <div class="progress bg-soft-danger shadow-none w-100" style="height: 6px">
                     <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
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
                  <div class="border bg-soft-success rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
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
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20px"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
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
