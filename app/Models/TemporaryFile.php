<?php

namespace App\Models;

use App\Http\Controllers\FileUploadController;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Storage;

/**
 * App\Models\TemporaryFile
 *
 * @property int $id
 * @property string $folder
 * @property string $filename
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task query()
 * @method static Builder|Task whereBonus($value)
 * @method static Builder|Task whereCompletionDate($value)
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereCreatedBy($value)
 * @method static Builder|Task whereCustomFields($value)
 * @method static Builder|Task whereDependsOn($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereDueDate($value)
 * @method static Builder|Task whereEstimatedTime($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task wherePenalty($value)
 * @method static Builder|Task wherePhaseId($value)
 * @method static Builder|Task wherePriority($value)
 * @method static Builder|Task whereStartDate($value)
 * @method static Builder|Task whereStatus($value)
 * @method static Builder|Task whereSubtaskOf($value)
 * @method static Builder|Task whereTitle($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @method static Builder|Task whereUpdatedBy($value)
 * @mixin Eloquent
 */

class TemporaryFile extends Model
{
  use HasFactory;

  protected $fillable = [
    'folder',
    'filename',
  ];

  public function path(): string {
    return 'app/public/media/tmp/' . $this->folder . '/' . $this->filename;
  }

  public function delete(): bool|null {
    Storage::deleteDirectory(FileUploadController::$tmpFileDir . $this->folder);
    return parent::delete();
  }
}
