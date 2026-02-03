<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    protected $fillable = [
        'expense_category_id',
        'title',
        'amount',
        'date',
        'description',
        'receipt_path',

        'status',
        'is_recurring',
        'is_tax_deductible',
        'is_billable'
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
        'is_recurring' => 'boolean',
        'is_tax_deductible' => 'boolean',
        'is_billable' => 'boolean',
    ];

    public function expenseCategory(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
