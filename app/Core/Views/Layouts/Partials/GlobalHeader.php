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

    <script>
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
    </script>