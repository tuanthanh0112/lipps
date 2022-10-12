<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UploadFile extends Model
{
    use HasFactory;

    protected $table = 'upload_files';
	protected $primaryKey = 'id';
    protected $fillable = [
		'id',
		'url',
        'name',
	];


    

}
