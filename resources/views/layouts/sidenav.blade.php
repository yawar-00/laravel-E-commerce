<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.sidebar {
  width: 250px;
  height: 100vh;
  background-color:#bfc7a4;
  color: #fff;
  transition: all 0.3s ease;
  overflow: hidden;
  z-index: 100;
}

.sidebar.collapsed {
  width: 70px;
}





.nav-links {
  list-style: none;
  padding: 0;
}

.nav-links li {
  margin: 10px 0;
}

.nav-links a {
  color: white;
  display: flex;
  align-items: center;
  padding: 12px 20px;
  text-decoration: none;
  transition: background 0.3s;
}


.nav-links a i {
  width: 25px;
  font-size: 18px;
  text-align: center;
}

.nav-links a span {
  margin-left: 15px;
  transition: opacity 0.3s;
}

.sidebar.collapsed a span {
  opacity: 0;
  visibility: hidden;
}

.nav-links a:hover {
  background-color: #00b894;
  border-radius: 4px;
}
.active {
  font-weight: bold;
  background-color: #00b894;

  color: white;
  border-radius: 5px;
  padding: 5px 10px;
}

/* Topbar */
.topbar {
  display: flex;
  align-items: center;
  background-color: #dff9fb;
  height: 60px;
  padding: 0 20px;
  margin-left: 250px;
  transition: margin-left 0.3s ease;
}

.sidebar.collapsed ~ .topbar {
  margin-left: 70px;
}

.topbar i {
  font-size: 24px;
  cursor: pointer;
  color: #2d3436;
  margin-right: 20px;
}

.topbar h1 {
  font-size: 20px;
  color: #2d3436;
}

/* Main content */
.main-content {
  margin-left: 250px;
  padding: 20px;
  transition: margin-left 0.3s ease;
}

.sidebar.collapsed ~ .main-content {
  margin-left: 70px;
}

/* Responsive */
@media (max-width: 768px) {
  .sidebar {
    left: -250px;
  }

  .sidebar.show {
    left: 0;
  }

  .topbar {
    margin-left: 0;
  }

  .main-content {
    margin-left: 0;
  }

  .sidebar.collapsed ~ .topbar,
  .sidebar.collapsed ~ .main-content {
    margin-left: 0;
  }
}

</style>
<div class="sidebar" id="sidebar">  
    <ul class="nav-links">
  <li>
    <a href="{{ route('AdminDashboard') }}" class="{{ request()->routeIs('AdminDashboard') ? 'active' : '' }}">
      <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
    </a>
  </li>
  <li>
    <a href="{{ route('products') }}" class="{{ request()->routeIs('products') ? 'active' : '' }}">
      <i class="fas fa-box"></i><span>Products</span>
    </a>
  </li>
  <li>
    <a href="{{ route('bannerControl') }}" class="{{ request()->routeIs('bannerControl') ? 'active' : '' }}">
    <i class="fa-regular fa-calendar-check"></i><span>Banner Control</span>
    </a>
  </li>
  <li>
    <a href="{{route('admin.about.list')}}" class="{{ request()->routeIs('admin.about.list') ? 'active' : '' }}">
      <i class="fas fa-cogs"></i><span>About Us Control</span>
    </a>
  </li>
  <li>
  <form method="POST" action="{{ route('logout') }}" >
    @csrf
    <a href="{{route('logout')}}" class="{{ request()->routeIs('logout') ? 'active' : '' }}" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown">
      <i class="fas fa-sign-out-alt"></i><span>Logout</span>
    </a>
  </form>  
  </li>
</ul>

  </div>
  <!-- <script>
    var toggleBtn = document.getElementById('toggleBtn');
var sidebar = document.getElementById('sidebar');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');

  // For small screens
  if (window.innerWidth <= 768) {
    sidebar.classList.toggle('show');
  }
});
</script> -->
