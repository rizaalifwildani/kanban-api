<?php

namespace App\Models;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketComment extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'ticket_id',
    'user_id',
    'content',
  ];

  /**
   * Get the column that owns the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function ticket(): BelongsTo
  {
    return $this->belongsTo(Ticket::class, 'ticket_id');
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
}
