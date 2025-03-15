 <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
     <div class="sidebar-header d-flex align-items-center justify-content-start">
         <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
             <!--Logo start-->
             <!--logo End-->

             <!--Logo start-->
             <div class="logo-main">
                 <div class="logo-normal">
                     logo
                 </div>
                 <div class="logo-mini">
                     logo mini
                 </div>
             </div>
             <!--logo End-->




             <h4 class="logo-title">logo title</h4>
         </a>
         <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
             <i class="icon">
                 <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                     <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5"
                         stroke-linecap="round" stroke-linejoin="round"></path>
                 </svg>
             </i>
         </div>
     </div>
     <div class="sidebar-body pt-0 data-scrollbar">
         <div class="sidebar-list">
             <!-- Sidebar Menu Start -->
             <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                 <li class="nav-item static-item">
                     <a class="nav-link static-item disabled" href="#" tabindex="-1">
                         <span class="default-icon">Home</span>
                         <span class="mini-icon">-</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"
                         aria-current="page" href="{{ route('admin.dashboard') }}">
                         <i class="icon">
                             <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                 class="icon-20">
                                 <path opacity="0.4"
                                     d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                     fill="currentColor"></path>
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                     fill="currentColor"></path>
                             </svg>
                         </i>
                         <span class="item-name">Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <hr class="hr-horizontal">
                 </li>
                 <li class="nav-item static-item">
                     <a class="nav-link static-item disabled" href="#" tabindex="-1">
                         <span class="default-icon">User</span>
                         <span class="mini-icon">-</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteName() === 'admin.teacher.index' ? 'active' : '' }}"
                         href="{{ route('admin.teacher.index') }}">
                         <i class="icon">
                             <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                     fill="currentColor"></path>
                                 <path opacity="0.4"
                                     d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                     fill="currentColor"></path>
                             </svg>
                         </i>
                         <span class="item-name">Teacher</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteName() === 'admin.student.index' ? 'active' : '' }}"
                         href="{{ route('admin.student.index') }}">
                         <i class="icon">
                             <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                     fill="currentColor"></path>
                                 <path opacity="0.4"
                                     d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                     fill="currentColor"></path>
                             </svg>
                         </i>
                         <span class="item-name">Student</span>
                     </a>
                 </li>
                 <li>
                     <hr class="hr-horizontal">
                 </li>
                 <li class="nav-item static-item">
                     <a class="nav-link static-item disabled" href="#" tabindex="-1">
                         <span class="default-icon">Elements</span>
                         <span class="mini-icon">-</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteName() === 'admin.class.index' ? 'active' : '' }}"
                         href="{{ route('admin.class.index') }}">
                         <i class="icon">
                             <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                     fill="currentColor"></path>
                                 <path opacity="0.4"
                                     d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                     fill="currentColor"></path>
                             </svg>
                         </i>
                         <span class="item-name">Class</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ Route::currentRouteName() === 'admin.course.index' ? 'active' : '' }}"
                         href="{{ route('admin.course.index') }}">
                         <i class="icon">
                             <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                     d="M7.7688 8.71387H16.2312C18.5886 8.71387 20.5 10.5831 20.5 12.8885V17.8254C20.5 20.1308 18.5886 22 16.2312 22H7.7688C5.41136 22 3.5 20.1308 3.5 17.8254V12.8885C3.5 10.5831 5.41136 8.71387 7.7688 8.71387ZM11.9949 17.3295C12.4928 17.3295 12.8891 16.9419 12.8891 16.455V14.2489C12.8891 13.772 12.4928 13.3844 11.9949 13.3844C11.5072 13.3844 11.1109 13.772 11.1109 14.2489V16.455C11.1109 16.9419 11.5072 17.3295 11.9949 17.3295Z"
                                     fill="currentColor"></path>
                                 <path opacity="0.4"
                                     d="M17.523 7.39595V8.86667C17.1673 8.7673 16.7913 8.71761 16.4052 8.71761H15.7447V7.39595C15.7447 5.37868 14.0681 3.73903 12.0053 3.73903C9.94257 3.73903 8.26594 5.36874 8.25578 7.37608V8.71761H7.60545C7.20916 8.71761 6.83319 8.7673 6.47754 8.87661V7.39595C6.4877 4.41476 8.95692 2 11.985 2C15.0537 2 17.523 4.41476 17.523 7.39595Z"
                                     fill="currentColor"></path>
                             </svg>
                         </i>
                         <span class="item-name">Courses</span>
                     </a>
                 </li>
                  <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M12.0865 22C11.9627 22 11.8388 21.9716 11.7271 21.9137L8.12599 20.0496C7.10415 19.5201 6.30481 18.9259 5.68063 18.2336C4.31449 16.7195 3.5544 14.776 3.54232 12.7599L3.50004 6.12426C3.495 5.35842 3.98931 4.67103 4.72826 4.41215L11.3405 2.10679C11.7331 1.96656 12.1711 1.9646 12.5707 2.09992L19.2081 4.32684C19.9511 4.57493 20.4535 5.25742 20.4575 6.02228L20.4998 12.6628C20.5129 14.676 19.779 16.6274 18.434 18.1581C17.8168 18.8602 17.0245 19.4632 16.0128 20.0025L12.4439 21.9088C12.3331 21.9686 12.2103 21.999 12.0865 22Z" fill="currentColor"></path>
                                    <path d="M11.3194 14.3209C11.1261 14.3219 10.9328 14.2523 10.7838 14.1091L8.86695 12.2656C8.57097 11.9793 8.56795 11.5145 8.86091 11.2262C9.15387 10.9369 9.63207 10.934 9.92906 11.2193L11.3083 12.5451L14.6758 9.22479C14.9698 8.93552 15.448 8.93258 15.744 9.21793C16.041 9.50426 16.044 9.97004 15.751 10.2574L11.8519 14.1022C11.7049 14.2474 11.5127 14.3199 11.3194 14.3209Z" fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Content</span>
                            <i class="right-icon">
                                <svg class="icon-18" xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-auth" data-bs-parent="#sidebar-menu">
                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.content.index' ? 'active' : '' }}"  href="{{ route('admin.content.index') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> L </i>
                                    <span class="item-name">List</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.group.list' ? 'active' : '' }}"  href="{{ route('admin.group.list') }}">
                                    <i class="icon">
                                        <svg class="icon-10" xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                            <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> L </i>
                                    <span class="item-name">Group</span>
                                </a>
                            </li>
                          
                        </ul>
                    </li>                 
             </ul>
             <!-- Sidebar Menu End -->
         </div>
     </div>
     <div class="sidebar-footer"></div>
 </aside>
