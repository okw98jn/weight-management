<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoalSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'start_weight',
        'goal_weight',
        'is_current_goal',
    ];

    /**
     * Get the attributes that should be cast
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_current_goal' => 'boolean',
        ];
    }
}
