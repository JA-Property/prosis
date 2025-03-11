
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Single Drawer, JSON, Active Button, Sub-titles with Centered Search</title>
  <!-- Tailwind CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    rel="stylesheet"
  />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
  />
</head>
<body class="bg-gray-50">
    <div class="fixed top-20 right-0 m-8 p-3 text-xs font-mono text-white h-6 w-6 rounded-full flex items-center justify-center bg-gray-700 sm:bg-pink-500 md:bg-orange-500 lg:bg-green-500 xl:bg-blue-500">
        <div class="block  sm:hidden md:hidden lg:hidden xl:hidden">al</div>
        <div class="hidden sm:block  md:hidden lg:hidden xl:hidden">sm</div>
        <div class="hidden sm:hidden md:block  lg:hidden xl:hidden">md</div>
        <div class="hidden sm:hidden md:hidden lg:block  xl:hidden">lg</div>
        <div class="hidden sm:hidden md:hidden lg:hidden xl:block">xl</div>
      </div>
<!-- FIXED HEADER -->
<header class="fixed top-0 left-0 right-0 bg-blue-900 text-white h-12 flex items-center z-50">
<?php require_once ("Partials/GlobalHeader.php"); ?>
  </header>
  

<!-- MAIN LAYOUT (push below header) -->
<div class="pt-12 flex h-screen">
  <!-- LEFT SIDEBAR (dynamically generated) -->
  <aside id="sidebar" class="bg-gray-800 text-white w-20 flex flex-col py-4 px-2 space-y-4">
    <!-- Sidebar buttons will be generated via JSON -->
  </aside>

  <!-- MAIN CONTENT -->
  <main class="flex-1 p-4 overflow-auto">
  <?= $content ?? '' ?>
    
  
  </main>
</div>

<!-- SINGLE-LEVEL DRAWER (no second-level) -->
<div
  id="menuDrawer"
  class="hidden absolute top-12 left-20 bottom-0 w-64 bg-white border-r border-gray-300 shadow-lg z-40"
>
  <div id="drawerContent" class="p-4 h-full flex flex-col"></div>
</div>

<!-- SCRIPTS -->
<script>
  /**
   * Fetch menu.json and generate the sidebar at runtime.
   */
  let sidebarMenu = []; // will store the fetched config
  let openItemId = null; // which top-level ID is open?
  let isDrawerOpen = false;
  
  function generateSidebar(menuData) {
    const sidebar = document.getElementById('sidebar');
    sidebar.innerHTML = ''; // clear any placeholders
  
    menuData.forEach((item) => {
      // Create a button for each sidebar item
      const btn = document.createElement('button');
      btn.className = 'flex flex-col items-center justify-center py-2 rounded hover:bg-gray-700';
      btn.setAttribute('data-menu-id', item.id);
  
      // Icon
      const iconEl = document.createElement('i');
      iconEl.className = `fas ${item.icon} text-2xl`;
      btn.appendChild(iconEl);
  
      // Label
      const spanEl = document.createElement('span');
      spanEl.className = 'text-xs mt-1';
      spanEl.textContent = item.label;
      btn.appendChild(spanEl);
  
      // Append to sidebar
      sidebar.appendChild(btn);
  
      // On click: open/close drawer
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const menuId = item.id;
        if (menuId === openItemId && isDrawerOpen) {
          closeDrawer();
        } else {
          openDrawer(menuId);
        }
        updateActiveButton();
      });
    });
  }
  
  function openDrawer(menuId) {
    const itemConfig = sidebarMenu.find((m) => m.id === menuId);
    if (!itemConfig) return;
    openItemId = menuId;
    isDrawerOpen = true;
    renderDrawer(itemConfig.label, itemConfig.children || []);
    document.getElementById('menuDrawer').classList.remove('hidden');
  }
  
  function renderDrawer(itemLabel, sections) {
    const drawerContent = document.getElementById('drawerContent');
    drawerContent.innerHTML = '';
  
    // Drawer Title
    const titleEl = document.createElement('h2');
    titleEl.className = 'text-xl font-bold text-gray-800 mb-4 flex items-center space-x-2';
    titleEl.innerHTML = `<i class="fas fa-folder-open"></i><span>${itemLabel}</span>`;
    drawerContent.appendChild(titleEl);
  
    // Render sections with sub-title headers
    sections.forEach((section) => {
      const subHeader = document.createElement('h3');
      subHeader.className = 'text-sm font-semibold text-gray-500 mt-4 mb-2 uppercase tracking-wide';
      subHeader.textContent = section.sectionTitle || 'Links';
      drawerContent.appendChild(subHeader);
  
      const ul = document.createElement('ul');
      ul.className = 'space-y-1 mb-2';
  
      section.links.forEach((lnk) => {
        const li = document.createElement('li');
        li.innerHTML = `<a href="${lnk.link || '#'}" class="text-blue-700 hover:underline">${lnk.label}</a>`;
        ul.appendChild(li);
      });
  
      drawerContent.appendChild(ul);
    });
  }
  
  function closeDrawer() {
    document.getElementById('menuDrawer').classList.add('hidden');
    openItemId = null;
    isDrawerOpen = false;
  }
  
  function updateActiveButton() {
    const buttons = document.querySelectorAll('#sidebar button[data-menu-id]');
    buttons.forEach((btn) => {
      const btnId = btn.getAttribute('data-menu-id');
      if (btnId === openItemId && isDrawerOpen) {
        btn.classList.add('border-l-4', 'border-blue-400', 'bg-blue-100', 'text-blue-800');
      } else {
        btn.classList.remove('border-l-4', 'border-blue-400', 'bg-blue-100', 'text-blue-800');
      }
    });
  }
  
  document.addEventListener('click', (e) => {
    const drawerEl = document.getElementById('menuDrawer');
    const sidebarEl = document.getElementById('sidebar');
    const clickedInDrawer = drawerEl.contains(e.target);
    const clickedInSidebar = sidebarEl.contains(e.target);
    if (!clickedInDrawer && !clickedInSidebar) {
      closeDrawer();
      updateActiveButton();
    }
  });
  
 
  
  /**
   * Fetch menu.json to populate the sidebar.
   */
  fetch('menu.json')
    .then((response) => response.json())
    .then((data) => {
      sidebarMenu = data;
      generateSidebar(sidebarMenu);
    })
    .catch((err) => {
      console.error('Error loading menu.json:', err);
    });
</script>
</body>
</html>
