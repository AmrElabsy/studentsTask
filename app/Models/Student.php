<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

	protected $fillable = ["first_name" , "second_name", "third_name", "last_name", "email","grade", "seating_number"];

	public function getNameAttribute() {
		return $this->first_name . " " . $this->second_name . " " . $this->third_name . " " . $this->last_name;
	}

}
