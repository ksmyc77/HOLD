function toggleSidebar() {
    var sidebar = document.querySelector('.sidebar');
    var sidebarToggle = document.querySelector('.sidebar-toggle');
    var menuIcon = sidebarToggle.querySelector('.menu-icon');
    var closeIcon = sidebarToggle.querySelector('.close-icon');
  
    if (sidebar && sidebarToggle && menuIcon && closeIcon) {
      sidebar.classList.toggle('sidebar-open');
      sidebarToggle.classList.toggle('sidebar-open');
      menuIcon.classList.toggle('hide');
      closeIcon.classList.toggle('hide');
    }
  }
  
  