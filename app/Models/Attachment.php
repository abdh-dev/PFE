<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Attachment
 *
 * @property int $id
 * @property string $src
 * @property string $name
 * @property string $size
 * @property string $type
 * @property int $chat_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Attachment newModelQuery()
 * @method static Builder|Attachment newQuery()
 * @method static Builder|Attachment query()
 * @method static Builder|Attachment whereChatId($value)
 * @method static Builder|Attachment whereCreatedAt($value)
 * @method static Builder|Attachment whereId($value)
 * @method static Builder|Attachment whereName($value)
 * @method static Builder|Attachment whereSize($value)
 * @method static Builder|Attachment whereSrc($value)
 * @method static Builder|Attachment whereType($value)
 * @method static Builder|Attachment whereUpdatedAt($value)
 * @mixin Eloquent
 */

class Attachment extends Model
{
    use HasFactory;
}
