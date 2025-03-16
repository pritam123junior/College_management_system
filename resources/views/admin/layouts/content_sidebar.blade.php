     <div class="sidebar-body pt-0 data-scrollbar">
         <div class="sidebar-list">
             <!-- Sidebar Menu Start -->
             <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                 <li class="nav-item static-item">
                     <a class="nav-link static-item disabled" href="#" tabindex="-1">
                         <span class="default-icon">Playlist</span>                         
                     </a>
                 </li>            
                  <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-auth" role="button" aria-expanded="false" aria-controls="sidebar-user">
                            <span class="item-name">Content</span>
                           <i class="bi bi-plus-square-fill"></i>
                        </a>
                        <ul class="sub-nav collapse" id="sidebar-auth" data-bs-parent="#sidebar-menu">

                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() === 'admin.content.index' ? 'active' : '' }}"  href="#">                                   
                                    <span class="item-name">List</span>
                                </a>
                            </li> 
                                                      
                        </ul>
                    </li>                 
             </ul>
             <!-- Sidebar Menu End -->
         </div>
     </div>

