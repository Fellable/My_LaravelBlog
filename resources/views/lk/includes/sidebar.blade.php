    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


        <!-- Sidebar -->
        <div class="sidebar">
             <nav class="mt-2">
                <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->


                                                                                       <li class="nav-item">
                                                                                         <a href="{{route('main.index')}}" class="nav-link">
                                                                                           <i class="nav-icon fas fa-home"></i>
                                                                                           <p>
                                                                                             Вернуться на главную
                                                                                           </p>
                                                                                         </a>
                                                                                       </li>


                                                                <li class="nav-item">
                                                                  <a href="{{route('lk.main.index')}}" class="nav-link">
                                                                    <i class="nav-icon fas fa-home"></i>
                                                                    <p>
                                                                      Основная страница ЛК
                                                                    </p>
                                                                  </a>
                                                                </li>

                                         <li class="nav-item">
                                           <a href="{{route('lk.liked.index')}}" class="nav-link">
                                             <i class="nav-icon fas fa-heart"></i>
                                             <p>
                                               Понравившиеся мне посты
                                             </p>
                                           </a>
                                         </li>


                                         <li class="nav-item">
                                           <a href="{{ route ('lk.comment.index') }}" class="nav-link">
                                             <i class="nav-icon fas fa-comment"></i>
                                             <p>
                                               Мои комментарии
                                             </p>
                                           </a>
                                         </li>
                </ul>
              </nav>
              <!-- /.sidebar-menu -->
            </div>
    </aside>
