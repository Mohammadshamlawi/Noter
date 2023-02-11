<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $collection_id
 * @property string $title
 * @property bool $is_locked
 * @property string $created_at
 * @property string $updated_at
 */
class Project extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['collection'];

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array<string>
     */
    protected $visible = [
        'id',
        'collection_id',
        'title',
        'is_locked',
        'notes',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'is_locked',
    ];


    public function notes()
    {
        return $this->hasMany(Note::class, 'project_id', 'id');
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }
}