<?php

namespace App\Http\Resources\AttendanceRecords;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceRecordsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'student_id' => $this->student->student_id,
            '1st' => $this->student->checkbox_1,
            '2nd' => $this->student->checkbox_2,
            '3rd' => $this->student->checkbox_3,
            '4th' => $this->student->checkbox_4,
            '5th' => $this->student->checkbox_5,
            '6th' => $this->student->checkbox_6,
            '7th' => $this->student->checkbox_7,
            '8th' => $this->student->checkbox_8,
            '9th' => $this->student->checkbox_9,
            '10th' => $this->student->checkbox_10,
            '11th' => $this->student->checkbox_11,
            '12th' => $this->student->checkbox_12,
            '13th' => $this->student->checkbox_13,
            '14th' => $this->student->checkbox_14,
            '15th' => $this->student->checkbox_15,
            'student_id' => $this->student->total_points,
            'student_id' => $this->student->average,
            'student_id' => $this->student->percentage,
        ];
    }
}