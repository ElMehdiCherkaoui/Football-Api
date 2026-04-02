<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FootballData extends Model
{
    public const TYPE_FIXTURES = 'fixtures';
    public const TYPE_TOPSCORERS = 'topscorers';

    protected $table = 'football_data';

    protected $fillable = [
        'type',
        'league',
        'season',
        'payload',
    ];

    protected $casts = [
        'league' => 'integer',
        'season' => 'integer',
        'payload' => 'array',
    ];
}
