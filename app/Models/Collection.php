<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * @property string $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class Collection extends Model
{
    use HasFactory, HasUlids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that should be visible in serialization.
     *
     * @var array<string>
     */
    protected $visible = [
        'id',
        'title',
        'projects',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['title'];


    public function getTrimmedTitleAttribute(): string
    {
        return strlen($this->title) > 100 ? substr($this->title, 0, 100) . '...' : $this->title;
    }


    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'collection_id', 'id');
    }

    public function notes(): HasOneThrough|HasManyThrough
    {
        return $this->through('projects')->has('notes');
    }
}
