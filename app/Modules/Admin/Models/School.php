<?php
namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // Specify the table if not following Laravel's plural naming convention.
    protected $table = 'schools';

    // Define the fillable fields for mass assignment.
    protected $fillable = [
        'name',
        'abbreviation',
        'is_summer_school',
        'address_full',
        'address',
        'city',
        'state',
        'postal_code',
        'county_name',
        'county_number',
        'school_number',
        'alternate_school_number',
        'stateprid',
        'exclude_from_state_reporting',
        'grade_low',
        'grade_high',
        'school_category',
        'historical_grade_low',
        'historical_grade_high',
        'default_next_school',
        'sort_order',
        'display_courses_from',
        'fee_exemption_status',
        'student_program_link',
    ];

    // Timestamps are enabled by default. If you wish to disable them:
    // public $timestamps = false;
}
