@extends('layouts.admin')

@section('title', 'Add Expense')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Page Header -->
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.expenses.index') }}" class="p-2 rounded-lg bg-slate-700/50 hover:bg-slate-700 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Add New Expense</h1>
            <p class="text-slate-400 mt-1">Create a new expense entry</p>
        </div>
    </div>

    <!-- Form -->
    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <!-- Basic Information -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                    <svg class="w-4 h-4 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                Basic Information
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="form-label">Expense Title <span class="text-rose-400">*</span></label>
                    <input type="text" id="title" name="title" class="form-input" placeholder="e.g., MacBook Pro M3" required>
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="form-label">Category <span class="text-rose-400">*</span></label>
                    <div class="relative">
                        <select id="category" name="category" class="form-select pr-10" required>
                            <option value="">Select a category</option>
                            <option value="equipment">🖥️ Equipment</option>
                            <option value="travel">✈️ Travel</option>
                            <option value="software">💻 Software</option>
                            <option value="supplies">📦 Supplies</option>
                            <option value="food">🍕 Food & Entertainment</option>
                            <option value="utilities">⚡ Utilities</option>
                            <option value="marketing">📢 Marketing</option>
                            <option value="other">📋 Other</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="form-label">Amount <span class="text-rose-400">*</span></label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">$</span>
                        <input type="number" id="amount" name="amount" class="form-input pl-8" placeholder="0.00" step="0.01" min="0" required>
                    </div>
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="form-label">Date <span class="text-rose-400">*</span></label>
                    <input type="date" id="date" name="date" class="form-input" required>
                </div>

                <!-- Payment Method -->
                <div>
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <div class="relative">
                        <select id="payment_method" name="payment_method" class="form-select pr-10">
                            <option value="credit_card">💳 Credit Card</option>
                            <option value="debit_card">💳 Debit Card</option>
                            <option value="cash">💵 Cash</option>
                            <option value="bank_transfer">🏦 Bank Transfer</option>
                            <option value="paypal">📱 PayPal</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-input resize-none" placeholder="Add any additional details about this expense..."></textarea>
                </div>
            </div>
        </div>

        <!-- Receipt Upload -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                Receipt / Documentation
            </h2>

            <div class="border-2 border-dashed border-slate-600/50 rounded-xl p-8 text-center hover:border-indigo-500/50 transition-colors cursor-pointer" onclick="document.getElementById('receipt').click()">
                <input type="file" id="receipt" name="receipt" class="hidden" accept="image/*,.pdf">
                <div class="w-16 h-16 mx-auto rounded-xl bg-slate-700/50 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                </div>
                <p class="text-white font-medium mb-1">Click to upload or drag and drop</p>
                <p class="text-sm text-slate-400">PNG, JPG, PDF up to 10MB</p>
            </div>
        </div>

        <!-- Additional Options -->
        <div class="glass-card p-6">
            <h2 class="text-lg font-semibold text-white mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-amber-500/20 flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                Additional Options
            </h2>

            <div class="space-y-4">
                <!-- Recurring -->
                <label class="flex items-center gap-4 p-4 bg-slate-700/30 rounded-xl cursor-pointer hover:bg-slate-700/50 transition-colors">
                    <input type="checkbox" name="is_recurring" class="w-5 h-5 rounded border-slate-600 bg-slate-700 text-indigo-500 focus:ring-indigo-500/50">
                    <div>
                        <p class="font-medium text-white">Recurring Expense</p>
                        <p class="text-sm text-slate-400">This expense repeats on a regular basis</p>
                    </div>
                </label>

                <!-- Tax Deductible -->
                <label class="flex items-center gap-4 p-4 bg-slate-700/30 rounded-xl cursor-pointer hover:bg-slate-700/50 transition-colors">
                    <input type="checkbox" name="is_tax_deductible" class="w-5 h-5 rounded border-slate-600 bg-slate-700 text-indigo-500 focus:ring-indigo-500/50">
                    <div>
                        <p class="font-medium text-white">Tax Deductible</p>
                        <p class="text-sm text-slate-400">This expense is eligible for tax deduction</p>
                    </div>
                </label>

                <!-- Billable -->
                <label class="flex items-center gap-4 p-4 bg-slate-700/30 rounded-xl cursor-pointer hover:bg-slate-700/50 transition-colors">
                    <input type="checkbox" name="is_billable" class="w-5 h-5 rounded border-slate-600 bg-slate-700 text-indigo-500 focus:ring-indigo-500/50">
                    <div>
                        <p class="font-medium text-white">Billable to Client</p>
                        <p class="text-sm text-slate-400">This expense will be billed to a client</p>
                    </div>
                </label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-end">
            <a href="{{ route('admin.expenses.index') }}" class="btn-secondary">
                Cancel
            </a>
            <button type="submit" name="action" value="draft" class="btn-secondary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                </svg>
                Save as Draft
            </button>
            <button type="submit" name="action" value="submit" class="btn-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Submit for Approval
            </button>
        </div>
    </form>
</div>
@endsection
