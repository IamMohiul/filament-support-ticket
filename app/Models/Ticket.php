<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'is_resolved',
        'comment',
        'assigned_to',
        'assigned_by'
    ];

    const PRIORITY = [
        'Low' => 'Low',
        'Medium' => 'Medium',
        'High' => 'High'
    ];

    const STATUS = [
        'Open' => 'Open',
        'Closed' => 'Closed',
        'Archived' => 'Archived'
    ];

    public function assignedTo() {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy() {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
