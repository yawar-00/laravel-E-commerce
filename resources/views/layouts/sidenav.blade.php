<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.sidebar {
  position: fixed;
  width: 250px;
  height: 100vh;
  background-color:#202938;
  color: #fff;
  transition: all 0.3s ease;
  overflow: hidden;
  z-index: 100;
}

.sidebar.collapsed {
  width: 70px;
}

.sidebar .logo {
  text-align: center;
  padding: 20px 0;
}

.sidebar .logo h2 {
  font-size: 22px;
  color: #00cec9;
  transition: 0.3s;
}

.sidebar.collapsed .logo h2 {
  display: none;
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
    <div class="logo">
      <h2>AdminPanel</h2>
    </div>
    <ul class="nav-links">
      <li><a href="{{route('AdminDashboard')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
      <li><a href="{{route('products')}}"><i class="fas fa-box"></i><span>Products</span></a></li>
      <li><a href="#"><i class="fas fa-shopping-cart"></i><span>Orders</span></a></li>
      <li><a href="#"><i class="fas fa-cogs"></i><span>Settings</span></a></li>
      <li><a href="#"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
    </ul>
  </div>
  <script>
    const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');

toggleBtn.addEventListener('click', () => {
  sidebar.classList.toggle('collapsed');

  // For small screens
  if (window.innerWidth <= 768) {
    sidebar.classList.toggle('show');
  }
});
</script>
