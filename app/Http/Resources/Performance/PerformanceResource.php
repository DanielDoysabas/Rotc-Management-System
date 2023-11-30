<?php

namespace App\Http\Resources\Performance;

use Illuminate\Http\Resources\Json\JsonResource;

class PerformanceResource extends JsonResource
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
            'course' => $this->student->course->name,
            'platoon' => $this->student->platoon->name,
            'type' => $this->type,
            'points' => $this->type == 'merit' ?  " + $this->points " : " - $this->points",
            'remark' => $this->remark,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}