<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeightReport extends Model
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
        'weight',
        'report_date',
    ];

    /**
     * 体重にkgを付与する
     *
     * @return Attribute
     */
    protected function weight(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value.'kg',
        );
    }
}
