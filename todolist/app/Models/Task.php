<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['description', 'state', 'user_id'];
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function all_tasks()
	{
		return Task::all();
	}
}