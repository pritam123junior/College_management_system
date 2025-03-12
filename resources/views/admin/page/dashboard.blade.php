@extends('admin.layouts.app')
@section('content')

<div>
   <div class="row">
      <!-- Total Students -->
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Students</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalStudents }}</h2>
                     <small>Updated count</small>
                  </div>
                  <div class="border bg-soft-danger rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Total Teachers -->
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Teachers</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalTeachers }}</h2>
                     <small>Updated count</small>
                  </div>
                  <div class="border bg-soft-info rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Total Classes -->
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Classes</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalClasses }}</h2>
                     <small>Updated count</small>
                  </div>
                  <div class="border bg-soft-success rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Total Courses -->
      <div class="col-lg-3 col-md-6">
         <div class="card">
            <div class="card-body">
               <div class="text-center">Total Courses</div>
               <div class="d-flex align-items-center justify-content-between mt-3">
                  <div>
                     <h2 class="counter">{{ $totalCourses }}</h2>
                     <small>Updated count</small>
                  </div>
                  <div class="border bg-soft-primary rounded p-3">
                     <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                     </svg>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
