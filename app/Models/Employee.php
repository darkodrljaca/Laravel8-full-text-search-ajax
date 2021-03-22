<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Employee extends Model
{
    use HasFactory;
    use Notifiable;
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'employees.name'  => 10,
            'employees.address'   => 10,
            'employees.city'   => 10,
            'employees.postal_code'    => 5,
            'employees.country'  => 8,            
        ]
    ];
        
}
