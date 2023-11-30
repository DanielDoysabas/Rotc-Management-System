<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'avatar' => $this->user?->avatar_profile,
            'student_id' => $this->student_id,
            'full_name' => $this->full_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'sex' => $this->sex,
            'birth_date' => $this->birth_date,
            'contact' => $this->contact,
            'email' => $this->user?->email,
            'course' => $this->course->name,
            'department' => $this->course->department->name,
            'platoon' => $this->platoon->name,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}