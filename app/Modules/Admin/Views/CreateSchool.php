<div class="container mx-auto p-6">
  <!-- Form Header -->
  <header class="mb-8">
    <h1 class="text-3xl font-mb-2 mb-4">School Setup – New School</h1>
    <p class="text-gray-600 text-sm">
      Setup should follow the standard fields below to ensure consistency with reporting expectations.
      Please fill in all <span class="text-red-500 font-semibold">required</span> information before proceeding.
    </p>
  </header>

  <form class="space-y-10">
    <!-- School Information Section -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">School Information</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- School NCES ID -->
<div class="relative">
  <label class="block text-sm font-medium text-gray-700">
    School NCES ID <span class="text-red-500">*</span>
    <i class="fa fa-info-circle text-gray-400 ml-1" title="Enter the National Center for Education Statistics (NCES) identification number for the school"></i>
  </label>
  <div class="relative mt-1">
    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
      <i class="fa fa-id-card"></i>
    </span>
    <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter NCES ID" />
  </div>
  <p class="text-xs text-gray-500 mt-1">The official NCES identification number for the school.</p>
</div>

        <!-- School Name -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            School Name <span class="text-red-500">*</span>
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Enter the full legal name of the school"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-school"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Enter school name" />
          </div>
          <p class="text-xs text-gray-500 mt-1">The official name of the school.</p>
        </div>
        <!-- School Abbreviation -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            School Abbreviation <span class="text-red-500">*</span>
            <i class="fa fa-info-circle text-gray-400 ml-1" title="A short code for the school name"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-font"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter abbreviation" />
          </div>
          <p class="text-xs text-gray-500 mt-1">e.g., ABC High</p>
        </div>
        <!-- Is a Summer School -->
        <div class="sm:col-span-1">
          <label class="inline-flex items-center mt-6">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" />
            <span class="ml-2 text-gray-700">Is a Summer School</span>
          </label>
        </div>
        <!-- School Number -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            School Number <span class="text-red-500">*</span>
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Once set, this cannot be changed"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-hashtag"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter school number" />
          </div>
          <p class="text-xs text-gray-500 mt-1">Unique identifier for the school.</p>
        </div>
        <!-- Alternate School Number -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Alternate School Number
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Repeat the school number if required"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-repeat"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter alternate number" />
          </div>
        </div>
        <!-- StatePrid -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            StatePrid
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Enter the three-digit program-specific school number"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-key"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 123" />
          </div>
        </div>
        <!-- Exclude From State Reporting -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Exclude From State Reporting?
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Select Yes if this school should be excluded"></i>
          </label>
          <select class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="no">No</option>
            <option value="yes">Yes</option>
          </select>
        </div>
        <!-- Grades (Lowest & Highest) -->
        <div class="sm:col-span-2">
          <label class="block text-sm font-medium text-gray-700">
            Grades (Lowest - Highest)
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Specify the lowest and highest grades for this school"></i>
          </label>
          <div class="flex space-x-3 mt-1">
            <input type="text" class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Lowest Grade" />
            <input type="text" class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Highest Grade" />
          </div>
        </div>
        <!-- School Category -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            School Category
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Define the category as per district guidelines"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-tag"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category" />
          </div>
        </div>
        <!-- Historical Grade Levels -->
        <div class="sm:col-span-2">
          <label class="block text-sm font-medium text-gray-700">
            Historical Grade Levels (Lowest & Highest)
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Typically left as 0 unless noted"></i>
          </label>
          <div class="flex space-x-3 mt-1">
            <input type="number" class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="0" />
            <input type="number" class="block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="0" />
          </div>
        </div>
        <!-- Default Next School -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Default Next School
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Enter 0 if not applicable"></i>
          </label>
          <input type="text" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Leave as 0 if not applicable" />
        </div>
        <!-- Sort Order -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Sort Order
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Determines the display order"></i>
          </label>
          <input type="number" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter sort order" />
        </div>
        <!-- When Scheduling, Display Courses From -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            When Scheduling, Display Courses From
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Select the reference school"></i>
          </label>
          <select class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="nextSchool">Next School</option>
            <option value="currentSchool">Current School</option>
          </select>
        </div>
      </div>
    </section>

    <!-- School Administration Information -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">School Administration Information</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Administrator Name -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Administrator Name <span class="text-red-500">*</span>
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Full name of the administrator"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-user"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter name" />
          </div>
        </div>
        <!-- Administrator Email -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Administrator Email <span class="text-red-500">*</span>
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Email address for notifications"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-envelope"></i>
            </span>
            <input type="email" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter email" />
          </div>
        </div>
        <!-- Administrator Phone -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Administrator Phone
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Contact number"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-phone"></i>
            </span>
            <input type="tel" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter phone number" />
          </div>
        </div>
        <!-- Administrator Fax -->
        <div class="relative">
          <label class="block text-sm font-medium text-gray-700">
            Administrator Fax
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Fax number"></i>
          </label>
          <div class="relative mt-1">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
              <i class="fa fa-fax"></i>
            </span>
            <input type="text" class="pl-10 pr-3 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter fax number" />
          </div>
        </div>
      </div>
    </section>

    <!-- School Fee Information -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">School Fee Information</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Fee Exemption Status
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Select exemption status"></i>
          </label>
          <select class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="exempted">Students Exempted from All Fees</option>
            <option value="nonExempt">Not Exempted</option>
          </select>
        </div>
      </div>
    </section>

    <!-- Other Information -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Other Information</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Student Program Link -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Student Program Link
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Select the appropriate program link"></i>
          </label>
          <select class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="">None Selected</option>
            <option value="program1">Program Link 1</option>
            <option value="program2">Program Link 2</option>
          </select>
        </div>
        <!-- Additional Information -->
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Additional Information
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Enter any additional notes"></i>
          </label>
          <textarea class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" rows="3" placeholder="Enter any additional notes..."></textarea>
        </div>
      </div>
    </section>

    <!-- Administrator Access Setup -->
    <section>
      <h2 class="text-2xl font-semibold text-gray-800 border-b pb-2 mb-4">Administrator Access Setup</h2>
      <div class="space-y-6">
        <p class="text-sm text-gray-600">
          To provide administrators access to this new school, follow the district-level security setup guidelines.
        </p>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Assign Roles
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Select one or more roles"></i>
          </label>
          <select class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <option value="role1">Role 1</option>
            <option value="role2">Role 2</option>
            <option value="role3">Role 3</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">
            Additional Staff Access
            <i class="fa fa-info-circle text-gray-400 ml-1" title="Comma separated staff names for extra access"></i>
          </label>
          <input type="text" class="mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Enter additional staff names (comma-separated)" />
        </div>
        <p class="text-xs text-gray-500">
          Note: Log out and log back in after role assignments to apply changes.
        </p>
      </div>
    </section>

    <!-- Submit Button -->
    <div>
      <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition duration-200">
        Save School Setup
      </button>
    </div>
  </form>
</div>
