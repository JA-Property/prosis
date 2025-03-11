
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
    <!-- Left: Logo + Title -->
    <div class="flex items-center px-4 space-x-2">
      <i class="fas fa-paragraph text-2xl"></i>
      <span class="font-bold text-lg">PowerSchool SIS</span>
    </div>
  
<!-- Center: Responsive, enterprise-style search bar (small on small screens, grows on larger) -->
<div
  class="absolute left-1/2 transform -translate-x-1/2
         w-40 sm:w-48 md:w-56 lg:w-64 xl:w-72"
>
  <div class="relative">
    <input
      type="text"
      class="w-full rounded-md border border-gray-300 pl-3 pr-10 py-2 text-sm text-gray-700
             placeholder-gray-400 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
      placeholder="Search"
    />
    <button
      class="absolute right-2 top-0 bottom-0 flex items-center text-gray-500 hover:text-gray-700"
    >
      <i class="fas fa-search"></i>
    </button>
  </div>
</div>

    <!-- Right side: Dropdown block + other icons -->
    <div class="ml-auto flex items-center space-x-4">
      <!-- Container: hidden on small, vertical on md (right-aligned), inline on lg -->
      <div class="hidden md:flex md:flex-col lg:flex-row md:items-end lg:items-center md:space-y-2 lg:space-y-0 lg:space-x-2">
        <!-- SCHOOL SELECTOR -->
        <div class="relative" id="schoolDropdown">
          <button
            id="schoolBtn"
            class="flex items-center justify-end text-xs font-semibold hover:underline focus:outline-none"
          >
            <span id="schoolBtnLabel" class="text-right">Apple Grove High School</span>
            <i class="fas fa-caret-down ml-1"></i>
          </button>
          <!-- School Dropdown Menu -->
          <div
            id="schoolMenu"
            class="hidden absolute right-0 mt-1 w-56 bg-white border border-gray-200 shadow-lg z-50 text-black text-sm"
          >
            <ul class="p-2">
              <li class="mb-1 font-semibold text-gray-600">District 1</li>
              <ul class="ml-4 mb-2 space-y-1">
                <li
                  class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                  data-school="Apple Grove High School"
                >
                  Apple Grove High School
                </li>
                <li
                  class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                  data-school="Pine Valley Middle"
                >
                  Pine Valley Middle
                </li>
                <li
                  class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                  data-school="Redwood Elementary"
                >
                  Redwood Elementary
                </li>
              </ul>
              <li class="mb-1 font-semibold text-gray-600">District 2</li>
              <ul class="ml-4 space-y-1">
                <li
                  class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                  data-school="Brookside High"
                >
                  Brookside High
                </li>
                <li
                  class="cursor-pointer hover:bg-gray-100 px-2 py-1"
                  data-school="Cedar Crest Elementary"
                >
                  Cedar Crest Elementary
                </li>
              </ul>
            </ul>
          </div>
        </div>
  
        <!-- TERM SELECTOR (Multi-Step) -->
        <div class="relative" id="termDropdown">
          <button
            id="termBtn"
            class="flex items-center justify-end text-xs font-semibold hover:underline focus:outline-none"
          >
            <span id="termBtnLabel" class="text-right">22-23 Semester 2</span>
            <i class="fas fa-caret-down ml-1"></i>
          </button>
          <!-- Term Dropdown Menu (3-step selection) -->
          <div
            id="termMenu"
            class="hidden absolute right-0 mt-1 w-56 bg-white border border-gray-200 shadow-lg z-50 text-black text-sm p-3 space-y-3"
          >
            <!-- Step 1: Select Year -->
            <div id="stepYear" class="space-y-2">
              <h3 class="font-semibold text-gray-700">Select Year</h3>
              <ul id="yearList" class="space-y-1"></ul>
            </div>
            <!-- Step 2: Select Semester -->
            <div id="stepSemester" class="space-y-2 hidden">
              <button id="backToYear" class="text-xs text-blue-600 hover:underline">
                &larr; Back
              </button>
              <h3 class="font-semibold text-gray-700">Select Semester</h3>
              <ul id="semesterList" class="space-y-1"></ul>
            </div>
            <!-- Step 3: Select Quarter -->
            <div id="stepQuarter" class="space-y-2 hidden">
              <button id="backToSemester" class="text-xs text-blue-600 hover:underline">
                &larr; Back
              </button>
              <h3 class="font-semibold text-gray-700">Select Quarter</h3>
              <ul id="quarterList" class="space-y-1"></ul>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Other icons -->
      <i class="fas fa-question-circle"></i>
      <div class="w-8 h-8 flex items-center justify-center rounded-full border border-white">AB</div>
    </div>
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
   * School Dropdown Logic
   */
  const schoolDropdown = document.getElementById('schoolDropdown');
  const schoolBtn = document.getElementById('schoolBtn');
  const schoolMenu = document.getElementById('schoolMenu');
  const schoolBtnLabel = document.getElementById('schoolBtnLabel');
  
  schoolBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isHidden = schoolMenu.classList.contains('hidden');
    closeAllDropdowns();
    if (isHidden) {
      schoolMenu.classList.remove('hidden');
    }
  });
  
  schoolMenu.querySelectorAll('[data-school]').forEach((li) => {
    li.addEventListener('click', () => {
      const selectedSchool = li.getAttribute('data-school');
      schoolBtnLabel.textContent = selectedSchool;
      schoolMenu.classList.add('hidden');
    });
  });
  
  /**
   * Multi-step Term Dropdown Logic
   */
  const termDropdown = document.getElementById('termDropdown');
  const termBtn = document.getElementById('termBtn');
  const termMenu = document.getElementById('termMenu');
  const termBtnLabel = document.getElementById('termBtnLabel');
  
  const stepYear = document.getElementById('stepYear');
  const yearList = document.getElementById('yearList');
  
  const stepSemester = document.getElementById('stepSemester');
  const semesterList = document.getElementById('semesterList');
  
  const stepQuarter = document.getElementById('stepQuarter');
  const quarterList = document.getElementById('quarterList');
  
  const backToYearBtn = document.getElementById('backToYear');
  const backToSemesterBtn = document.getElementById('backToSemester');
  
  const termData = [
    {
      year: '2022-2023',
      semesters: [
        { name: 'Semester 1', quarters: ['Q1', 'Q2'] },
        { name: 'Semester 2', quarters: ['Q3', 'Q4'] }
      ]
    },
    {
      year: '2023-2024',
      semesters: [
        { name: 'Semester 1', quarters: ['Q1', 'Q2'] },
        { name: 'Semester 2', quarters: ['Q3', 'Q4'] }
      ]
    }
  ];
  
  let selectedYear = null;
  let selectedSemester = null;
  
  termBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isHidden = termMenu.classList.contains('hidden');
    closeAllDropdowns();
    if (isHidden) {
      stepYear.classList.remove('hidden');
      stepSemester.classList.add('hidden');
      stepQuarter.classList.add('hidden');
      termMenu.classList.remove('hidden');
    }
  });
  
  function renderYears() {
    yearList.innerHTML = '';
    termData.forEach((item) => {
      const li = document.createElement('li');
      li.className = 'cursor-pointer hover:bg-gray-100 px-2 py-1';
      li.textContent = item.year;
      li.addEventListener('click', () => {
        selectedYear = item.year;
        showSemesterStep(item.semesters);
      });
      yearList.appendChild(li);
    });
  }
  renderYears();
  
  function showSemesterStep(semesters) {
    stepYear.classList.add('hidden');
    stepSemester.classList.remove('hidden');
    stepQuarter.classList.add('hidden');
  
    semesterList.innerHTML = '';
    semesters.forEach((sem) => {
      const li = document.createElement('li');
      li.className = 'cursor-pointer hover:bg-gray-100 px-2 py-1';
      li.textContent = sem.name;
      li.addEventListener('click', () => {
        selectedSemester = sem.name;
        showQuarterStep(sem.quarters);
      });
      semesterList.appendChild(li);
    });
  }
  
  function showQuarterStep(quarters) {
    stepSemester.classList.add('hidden');
    stepQuarter.classList.remove('hidden');
  
    quarterList.innerHTML = '';
    quarters.forEach((q) => {
      const li = document.createElement('li');
      li.className = 'cursor-pointer hover:bg-gray-100 px-2 py-1';
      li.textContent = q;
      li.addEventListener('click', () => {
        const finalTerm = `${selectedYear} ${selectedSemester} ${q}`;
        termBtnLabel.textContent = finalTerm;
        termMenu.classList.add('hidden');
      });
      quarterList.appendChild(li);
    });
  }
  
  backToYearBtn.addEventListener('click', () => {
    stepYear.classList.remove('hidden');
    stepSemester.classList.add('hidden');
    stepQuarter.classList.add('hidden');
    selectedSemester = null;
  });
  
  backToSemesterBtn.addEventListener('click', () => {
    stepYear.classList.add('hidden');
    stepSemester.classList.remove('hidden');
    stepQuarter.classList.add('hidden');
  });
  
  function closeAllDropdowns() {
    schoolMenu.classList.add('hidden');
    termMenu.classList.add('hidden');
  }
  
  document.addEventListener('click', (e) => {
    const clickedInSchool = schoolDropdown.contains(e.target);
    const clickedInTerm = termDropdown.contains(e.target);
    if (!clickedInSchool && !clickedInTerm) {
      closeAllDropdowns();
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
