<?php

namespace App\Models;

use App\Models\User;
use App\Models\Column;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'column_id',
    'user_id',
    'assign_user_id',
    'title',
    'description',
  ];

  /**
   * Get the column that owns the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function column(): BelongsTo
  {
      return $this->belongsTo(Column::class, 'column_id');
  }

  /**
   * Get the user that owns the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class, 'user_id');
  }

  /**
   * Get the user that owns the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function assignUser(): BelongsTo
  {
      return $this->belongsTo(User::class, 'assign_user_id');
  }
}
