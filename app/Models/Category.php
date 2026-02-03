<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'color',
        'icon',
    ];

    /**
     * Get the expense categories for the category.
     */
    public function expenseCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExpenseCategory::class);
    }

    /**
     * Get the gradient classes for the category color.
     */
    public function getGradientClassesAttribute(): string
    {
        return match ($this->color) {
            'indigo' => 'from-indigo-500 to-purple-600',
            'emerald' => 'from-emerald-400 to-cyan-500',
            'sky' => 'from-sky-400 to-blue-500',
            'amber' => 'from-amber-400 to-orange-500',
            'rose' => 'from-rose-400 to-pink-500',
            'violet' => 'from-violet-400 to-purple-500',
            default => 'from-indigo-500 to-purple-600',
        };
    }

    /**
     * Get the shadow color class for the category.
     */
    public function getShadowClassAttribute(): string
    {
        return match ($this->color) {
            'indigo' => 'shadow-indigo-500/25',
            'emerald' => 'shadow-emerald-500/25',
            'sky' => 'shadow-sky-500/25',
            'amber' => 'shadow-amber-500/25',
            'rose' => 'shadow-rose-500/25',
            'violet' => 'shadow-violet-500/25',
            default => 'shadow-indigo-500/25',
        };
    }

    /**
     * Get the hover border class for the category.
     */
    public function getHoverBorderClassAttribute(): string
    {
        return match ($this->color) {
            'indigo' => 'hover:border-indigo-500/50',
            'emerald' => 'hover:border-emerald-500/50',
            'sky' => 'hover:border-sky-500/50',
            'amber' => 'hover:border-amber-500/50',
            'rose' => 'hover:border-rose-500/50',
            'violet' => 'hover:border-violet-500/50',
            default => 'hover:border-indigo-500/50',
        };
    }

    /**
     * Get the icon SVG path for the category.
     */
    public function getIconPathAttribute(): string
    {
        return match ($this->icon) {
            'computer' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'location' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
            'code' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
            'cart' => 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
            'briefcase' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'bolt' => 'M13 10V3L4 14h7v7l9-11h-7z',
            default => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
        };
    }
}
