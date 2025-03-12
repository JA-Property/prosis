<?php
namespace App\Modules\Admin\Controllers;

use App\Core\Controllers\BaseController;
use App\Modules\Admin\Models\School;
use Illuminate\Http\Request;

class SchoolController extends BaseController
{
    /**
     * Display a listing of schools.
     */
    public function index()
    {
        $schools = School::all();
        // Render the view with the global layout
        $this->render(__DIR__ . '/../Views/AllSchools.php', [
            'schools' => $schools,
        ]);
    }
    /**
     * Show the form for creating a new school.
     */
    public function create()
    {
        $this->render(__DIR__ . '/../Views/CreateSchool.php');
    }

    /**
     * Store a newly created school in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data.
        $data = $request->validate([
            'name'                         => 'required|string|max:255',
            'abbreviation'                 => 'required|string|max:50',
            'is_summer_school'             => 'sometimes|boolean',
            'address_full'                 => 'nullable|string',
            'address'                      => 'nullable|string|max:255',
            'city'                         => 'nullable|string|max:100',
            'state'                        => 'nullable|string|max:50',
            'postal_code'                  => 'nullable|string|max:20',
            'county_name'                  => 'nullable|string|max:100',
            'county_number'                => 'nullable|string|max:50',
            'school_number'                => 'required|string|max:50',
            'alternate_school_number'      => 'nullable|string|max:50',
            'stateprid'                    => 'nullable|string|max:3',
            'exclude_from_state_reporting' => 'sometimes|boolean',
            'grade_low'                    => 'nullable|integer',
            'grade_high'                   => 'nullable|integer',
            'school_category'              => 'nullable|string|max:100',
            'historical_grade_low'         => 'sometimes|integer',
            'historical_grade_high'        => 'sometimes|integer',
            'default_next_school'          => 'sometimes|integer',
            'sort_order'                   => 'sometimes|integer',
            'display_courses_from'         => 'nullable|string|max:50',
            'fee_exemption_status'         => 'nullable|string|max:100',
            'student_program_link'         => 'nullable|string|max:255',
        ]);

        // Create a new school record.
        School::create($data);

        $this->redirect('/admin/schools/index');
    }

    /**
     * Show the form for editing the specified school.
     */
    public function edit($id)
    {
        $school = School::findOrFail($id);
        $this->render(__DIR__ . '/../Views/EditSchool.php', [
            'school' => $school,
        ]);
    }

    /**
     * Update the specified school in storage.
     */
    public function update(Request $request, $id)
    {
        $school = School::findOrFail($id);

        // Validate the request data.
        $data = $request->validate([
            'name'                         => 'required|string|max:255',
            'abbreviation'                 => 'required|string|max:50',
            'is_summer_school'             => 'sometimes|boolean',
            'address_full'                 => 'nullable|string',
            'address'                      => 'nullable|string|max:255',
            'city'                         => 'nullable|string|max:100',
            'state'                        => 'nullable|string|max:50',
            'postal_code'                  => 'nullable|string|max:20',
            'county_name'                  => 'nullable|string|max:100',
            'county_number'                => 'nullable|string|max:50',
            // school_number is not changeable after creation.
            'alternate_school_number'      => 'nullable|string|max:50',
            'stateprid'                    => 'nullable|string|max:3',
            'exclude_from_state_reporting' => 'sometimes|boolean',
            'grade_low'                    => 'nullable|integer',
            'grade_high'                   => 'nullable|integer',
            'school_category'              => 'nullable|string|max:100',
            'historical_grade_low'         => 'sometimes|integer',
            'historical_grade_high'        => 'sometimes|integer',
            'default_next_school'          => 'sometimes|integer',
            'sort_order'                   => 'sometimes|integer',
            'display_courses_from'         => 'nullable|string|max:50',
            'fee_exemption_status'         => 'nullable|string|max:100',
            'student_program_link'         => 'nullable|string|max:255',
        ]);

        $school->update($data);

        $this->redirect('/admin/schools/index');
    }

    /**
     * Remove the specified school from storage.
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);
        $school->delete();
        $this->redirect('/admin/schools/index');
    }
}
