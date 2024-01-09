<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
       <div class="container-fluid">
              <div class="d-flex d-lg-none me-2">
                     <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                            <i class="ph-list"></i>
                     </button>
              </div>

              <div class="navbar-brand flex-1 flex-lg-0">
                     <a href="" class="d-inline-flex align-items-center" >
                            <img src="{{asset('assetss/images/logogkpi.png')}}" alt="">
                            <div class="text-white ms-2" style="font-size: 3.5vh; font-family:'Times New Roman', Times, serif">GKPI Pearaja Tarutung</div>
                     </a>                     
              </div>
        

              <ul class="nav flex-row justify-content-end order-1 order-lg-2">
                    

                     <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                            <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                                   <div class="status-indicator-container">
                                          <img src="{{asset('assetss/images/demo/users/user.png')}}" class="w-32px h-32px rounded-pill" alt="">
                                          <span class="status-indicator bg-success"></span>
                                   </div>
                                   @hasrole('admin')
                                   <span class="d-none d-lg-inline-block mx-lg-2">Sekretariat</span>
                                   @else
                                   <span class="d-none d-lg-inline-block mx-lg-2">Pengurus</span>
                                   @endhasrole
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                 
                                   <a href="{{ route('logout.action') }}" class="dropdown-item">
                                          <i class="ph-sign-out me-2"></i>
                                          Logout
                                   </a>
                            </div>
                           
                     </li>
              </ul>
       </div>
</div>