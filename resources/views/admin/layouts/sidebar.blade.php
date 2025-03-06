 <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('admin.dashboard') }}" class="simple-text">
                    Logo
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>    
                 <li class="active">
                    <a href="{{ route('admin.class.index') }}">                        
                        <p>Class</p>
                    </a>
                </li>  
                <li class="active">
                    <a href="{{ route('admin.class.index') }}">                        
                        <p>Student</p>
                    </a>
                </li>   
            </ul>
    	</div>
    </div>