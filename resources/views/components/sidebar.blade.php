 <aside class="sidebar">
     <div class="top">
         <div class="logo">

             <span>Admin Panel</span>
         </div>
         <i class="bx bx-menu" id="menubtn"></i>
     </div>
     <ul>
         <li>
             <a href="{{ route('dashboard.index') }}">
                 <i class="bx bxs-grid-alt"></i>
                 <span class="nav-item">Dashboard</span>
             </a>
             <span class="tooltip">Dashboard</span>
         </li>

         <li>
             <a href="{{ route('article.index') }}">
                 <i class='bx bxs-notepad'></i>
                 <span class="nav-item">Article</span>
             </a>
             <span class="tooltip">Article</span>
         </li>

         <li>
             <a href="{{ route('jobs.index') }}">
                 <i class='bx bxs-briefcase-alt-2'></i>
                 <span class="nav-item">Lowongan Pekerjaan</span>
             </a>
             <span class="tooltip">Lowongan Pekerjaan</span>
         </li>

         <li>
             <a href="{{ route('chart.index') }}">
                 <i class='bx bxs-bar-chart-alt-2'></i>
                 <span class="nav-item">Chart</span>
             </a>
             <span class="tooltip">Chart</span>
         </li>



         <li>
             <form action="{{ route('user.logout') }}" method="POST">
                 @csrf
                 @method('delete')
                 <button type="submit" style="text-decoration: none; all: unset">
                     <a href="">
                         <i class="bx bx-log-out"></i>
                         <span class="nav-item">Logout</span>
                     </a>
                 </button>
             </form>
             <span class="tooltip">Logout</span>
         </li>
     </ul>
 </aside>
