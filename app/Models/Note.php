<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property integer $id
 * @property integer $project_id
 * @property string $title
 * @property string $content
 * @property bool $is_locked
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Note extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notes';

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['project'];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array<string>
     */
    protected $visible = [
        'id',
        'project_id',
        'title',
        'content',
        'is_locked',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'project_id',
        'title',
        'content',
        'is_locked',
    ];


    public function getTrimmedContentAttribute()
    {
        return strlen($this->content) > 100 ? substr($this->content, 0, 100) . '...' : $this->content;
    }


    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
