<?php

namespace App\Models\Trip;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TripList extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'trip_list';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'start_date',
        'end_date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}