<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
	protected $guarded = array('id');

	// Diaryモデルのバリデーションを定義
	public static $rules = array(
		'title' => 'required|min:3',
		'content' => 'required|max:200',
	);

	use HasFactory;
	protected $fillable = [
		'title',
		'content',
	];
}
