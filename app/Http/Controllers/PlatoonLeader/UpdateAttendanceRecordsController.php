<?php

namespace App\Http\Controllers\PlatoonLeader;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AttendanceRecords\AttendanceRecordsRequest;
use App\Http\Resources\Attendance\AttendanceRecordsResource;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Student;
use App\Models\AttendanceRecords;
use App\Models\Otp;

class UpdateAttendanceRecordsController extends Controller
{
    public function update_merits(Request $data){
        if(request()->ajax()) 
        {
            $stud_id = $data->query('student_id');
            $merits = (int)$data->query('merits');
            $demerits = (int)$data->query('demerits');
            $total_points = (int)$merits - (int)$demerits;
            $percentage = (int)$total_points * 0.3;
            $semester = $data->query('semester');
            $year = $data->query('year');
            $a = [
              'semester'=>$semester,  
              'merits'=>$merits,  
              'demerits'=>$demerits,  
              'total_points'=>$total_points,  
              'percentage'=>$percentage,  
              'year'=>$year,  
            ];
            DB::table('merits_demerits')->where('student_id', $stud_id)->update($a);

            $student_data_merits = DB::table('merits_demerits')->get();
            return  DataTables::of($student_data_merits)->addIndexColumn()->addColumn('full_day', function ($data) {
                return $data->student_id.'-'.$data->semester.'-'.$data->merits.'-'.$data->demerits.'-'.$data->total_points
                .'-'.$data->percentage.'-'.$data->year;
            })->addColumn('school_years', function ($data) {
                $year_data = DB::table('school_years')->get();
                return $year_data;
            })->make(true);
        }    
    }

    public function update_records(Request $data){
        if(request()->ajax())
        {
            $g = $data->query('data');
            $stud_id = $data->query('student_id');
            $a = [];
            $total_points = 0;
            
            foreach ($g as $index => $value) {
                switch ($index) {
                    case 1:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_one'] = $value["element"];
                        break;
                    case 2:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_two'] = $value["element"];
                        break;
                    case 3:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_three'] = $value["element"];
                        break;
                    case 4:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_four'] = $value["element"];
                        break;
                    case 5:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_five'] = $value["element"];
                        break;
                    case 6:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_six'] = $value["element"];
                        break;
                    case 7:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_seven'] = $value["element"];
                        break;
                    case 8:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_eight'] = $value["element"];
                        break;
                    case 9:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_nine'] = $value["element"];
                        break;
                    case 10:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_ten'] = $value["element"];
                        break;
                    case 11:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_eleven'] = $value["element"];
                        break;
                    case 12:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_twelve'] = $value["element"];
                        break;
                    case 13:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_thirtheen'] = $value["element"];
                        break;
                    case 14:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_fourtheen'] = $value["element"];
                        break;
                    case 15:
                        if ($value["element"]==1) {
                            $total_points += 1;
                        }
                        $a['day_fiftheen'] = $value["element"];
                        break;
                    default:
                        break;
                }
            }
            $a["total_points"] = $total_points;
            $cal = $total_points / 15;
            $a["average"] = $cal * 100;
            $percentage = $a["average"] * 0.3;
            $a["percentage_record"] = $percentage;
            DB::table('attendance_records')->where('student_id', $stud_id)->update($a);

            $student_data = DB::table('attendance_records')->get();
            return  DataTables::of($student_data)->addIndexColumn()->addColumn('full_day', function ($data) {
                return $data->student_id.' - '.$data->day_one.' - '.$data->day_two.' - '.$data->day_three.' - '.$data->day_four.' - '.$data->day_five.' - '.
                $data->day_six.' - '.$data->day_seven.' - '.$data->day_eight.' - '.$data->day_nine.' - '.$data->day_ten.' - '.$data->day_eleven.' - '.
                $data->day_twelve.' - '.$data->day_thirtheen.' - '.$data->day_fourtheen.' - '.$data->day_fiftheen;
            })->make(true);
        }
    }
}