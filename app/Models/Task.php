<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory, HasUuids;
// giving the user permission to enter these fields
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'complete',
        'in_progress',

    ];

    //the opposite:restricting permissionson certain fields
    // protected $gaurded = [
    //     'id',
    //     "user_id"
    // ];

       // a task belongs to one user
       public function user(){
        return $this->belongs(User::class);
    }
 }
