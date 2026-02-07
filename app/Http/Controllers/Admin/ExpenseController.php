<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with(['expenseCategory.category'])->latest('date')->paginate(10);
        return view('admin.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expenseCategories = ExpenseCategory::with('category')->where('status', true)->get();
        return view('admin.expenses.create', compact('expenseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:10240',
            'action' => 'required|in:draft,submit',
        ]);

        $status = $validated['action'] === 'draft' ? 'draft' : 'submitted';

        $receiptPath = null;
        if ($request->hasFile('receipt')) {
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
        }

        Expense::create([
            'title' => $validated['title'],
            'expense_category_id' => $validated['expense_category_id'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            'receipt_path' => $receiptPath,
            'status' => $status,
            'is_recurring' => $request->has('is_recurring'),
            'is_tax_deductible' => $request->has('is_tax_deductible'),
            'is_billable' => $request->has('is_billable'),
        ]);

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $expenseCategories = ExpenseCategory::with('category')->where('status', true)->get();
        return view('admin.expenses.edit', compact('expense', 'expenseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'expense_category_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'receipt' => 'nullable|file|mimes:jpeg,png,pdf|max:10240',
        ]);

        $status = $expense->status; // Preserve existing status or add logic to change it if needed

        if ($request->hasFile('receipt')) {
            // Delete old receipt if exists
            if ($expense->receipt_path) {
                Storage::disk('public')->delete($expense->receipt_path);
            }
            
            $receiptPath = $request->file('receipt')->store('receipts', 'public');
            $expense->receipt_path = $receiptPath;
        }

        $expense->update([
            'title' => $validated['title'],
            'expense_category_id' => $validated['expense_category_id'],
            'amount' => $validated['amount'],
            'date' => $validated['date'],
            'description' => $validated['description'],
            // receipt_path is updated above if a new file is uploaded
            'is_recurring' => $request->has('is_recurring'),
            'is_tax_deductible' => $request->has('is_tax_deductible'),
            'is_billable' => $request->has('is_billable'),
        ]);

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        if ($expense->receipt_path) {
            Storage::disk('public')->delete($expense->receipt_path);
        }
        
        $expense->delete();

        return redirect()->route('admin.expenses.index')
            ->with('success', 'Expense deleted successfully!');
    }
}
