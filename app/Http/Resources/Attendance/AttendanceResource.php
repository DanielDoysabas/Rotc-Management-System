<?php

namespace App\Http\Resources\Attendance;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'student' => $this->student->full_name,
            'schedule' => formatDate($this->created_at),
            'date_time_in' => $this->date_time_in ? formatDate($this->date_time_in, 'dateTime') : '',
            'date_time_out' => $this->date_time_out ? formatDate($this->date_time_out, 'dateTime') : '',
            'status' => is_null($this->date_time_in) && is_null($this->date_time_out) ? 'Absent' : 'Present',
        ];
    }
}