<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{
  /**
   * All the relationships to be touched.
   *
   * @var array
   */
  protected $touches = ['model'];

  /**
   * Boot events
   * @return void
   */
  public static function boot(): void {
    parent::boot();

    if ($user = Auth::user()) {
      static::creating(function ($model) use ($user) {
        $model->created_by = $user->id;
        $model->updated_by = $user->id;
      });

      static::updating(function ($model) use ($user) {
        $model->updated_by = $user->id;
      });
    }
  }

  /**
   * User that uploaded the image.
   *
   * @return BelongsTo
   */
  public function creator(): BelongsTo {
    return $this->belongsTo(User::class, 'created_by');
  }
}
