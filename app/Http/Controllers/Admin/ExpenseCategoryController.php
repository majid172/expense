<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseCategories = ExpenseCategory::with('category')->latest()->paginate(10);
        $categories = Category::all(); // For the create/edit modals
        return view('admin.expense_categories.index', compact('expenseCategories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        ExpenseCategory::create([
            'category_id' => $validated['category_id'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'status' => $request->has('status'), // Checkbox handling
        ]);

        return redirect()->route('admin.expense-categories.index')
            ->with('success', 'Expense Category created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $expenseCategory->update([
            'category_id' => $validated['category_id'],
            'type' => $validated['type'],
            'description' => $validated['description'], // Fix: was missing description update in previous logic potentially
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.expense-categories.index')
            ->with('success', 'Expense Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        return redirect()->route('admin.expense-categories.index')
            ->with('success', 'Expense Category deleted successfully!');
    }
}
