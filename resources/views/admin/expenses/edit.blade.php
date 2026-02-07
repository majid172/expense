@extends('layouts.admin')

@section('title', 'Edit Expense')

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
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Edit Expense</h1>
            <p class="text-slate-400 mt-1">Update expense details</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.expenses.update', $expense) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        
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
                <div class="md:col-span-2 relative group">
                    <label for="title" class="block text-sm font-semibold text-slate-200 mb-2">
                        Expense Title <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                        <div class="relative flex items-center">
                            <div class="absolute left-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <input type="text" id="title" name="title" value="{{ old('title', $expense->title) }}"
                                class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-slate-800/90 transition-all duration-300" 
                                placeholder="e.g., MacBook Pro M3" required>
                        </div>
                    </div>
                </div>

                <!-- Expense Category -->
                <div class="relative group">
                    <label for="expense_category_id" class="block text-sm font-semibold text-slate-200 mb-2">
                        Expense Category <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <select id="expense_category_id" name="expense_category_id" 
                                class="w-full pl-12 pr-10 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white font-medium placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:bg-slate-800/90 appearance-none transition-all duration-300" required>
                                <option value="">Select a category</option>
                                @foreach($expenseCategories->groupBy('category.name') as $parentName => $items)
                                    <optgroup label="{{ $parentName }}" class="bg-slate-800 text-slate-300 font-bold">
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}" {{ old('expense_category_id', $expense->expense_category_id) == $item->id ? 'selected' : '' }} class="bg-slate-800 text-white font-normal">
                                                {{ $item->type }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amount -->
                <div class="relative group">
                    <label for="amount" class="block text-sm font-semibold text-slate-200 mb-2">
                        Amount <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-slate-400 group-focus-within:text-amber-400 text-lg group-focus-within:font-bold transition-all">$</span>
                            <input type="number" id="amount" name="amount" value="{{ old('amount', $expense->amount) }}"
                                class="w-full pl-10 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-bold placeholder-slate-500 focus:outline-none focus:border-amber-500 focus:bg-slate-800/90 transition-all duration-300" 
                                placeholder="0.00" step="0.01" min="0" required>
                        </div>
                    </div>
                </div>

                <!-- Date -->
                <div class="relative group">
                    <label for="date" class="block text-sm font-semibold text-slate-200 mb-2">
                        Date <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 via-indigo-500 to-violet-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                        <div class="relative flex items-center">
                            <div class="absolute left-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400 group-focus-within:text-blue-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="date" id="date" name="date" value="{{ old('date', $expense->date->format('Y-m-d')) }}"
                                class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white font-medium placeholder-slate-500 focus:outline-none focus:border-blue-500 focus:bg-slate-800/90 transition-all duration-300" required>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="md:col-span-2 relative group">
                    <label for="description" class="block text-sm font-semibold text-slate-200 mb-2">
                        Description
                    </label>
                    <div class="relative">
                        <div class="absolute left-4 top-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-slate-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </div>
                        <textarea id="description" name="description" rows="4" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-slate-500 focus:bg-slate-800/90 transition-all duration-300 resize-none" 
                            placeholder="Add any additional details about this expense...">{{ old('description', $expense->description) }}</textarea>
                    </div>
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

            @if($expense->receipt_path)
            <div class="mb-4 p-4 rounded-xl bg-slate-800/50 border border-slate-700/50 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white">Current Receipt</p>
                        <a href="{{ Storage::url($expense->receipt_path) }}" target="_blank" class="text-xs text-indigo-400 hover:text-indigo-300 underline">View Receipt</a>
                    </div>
                </div>
                <span class="text-xs text-slate-500">Upload new to replace</span>
            </div>
            @endif

            <div class="relative group border-2 border-dashed border-slate-600/50 hover:border-emerald-500/50 rounded-xl p-8 text-center transition-all duration-300 cursor-pointer overflow-hidden" onclick="document.getElementById('receipt').click()">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <input type="file" id="receipt" name="receipt" class="hidden" accept="image/*,.pdf">
                <div class="relative">
                    <div class="w-16 h-16 mx-auto rounded-xl bg-gradient-to-br from-slate-700/50 to-slate-800/50 group-hover:from-emerald-500/20 group-hover:to-teal-500/20 flex items-center justify-center mb-4 transition-all duration-300 transform group-hover:scale-110 group-hover:-rotate-3">
                        <svg class="w-8 h-8 text-slate-400 group-hover:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                    </div>
                    <p class="text-white font-medium mb-1 group-hover:text-emerald-400 transition-colors">Click to upload or drag and drop</p>
                    <p class="text-sm text-slate-400 group-hover:text-slate-300 transition-colors">PNG, JPG, PDF up to 10MB</p>
                </div>
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

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Recurring -->
                <div class="relative group p-4 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_recurring" class="sr-only peer" {{ old('is_recurring', $expense->is_recurring) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-500"></div>
                        </label>
                    </div>
                    <p class="font-semibold text-white">Recurring</p>
                    <p class="text-xs text-slate-400">Repeats regularly</p>
                </div>

                <!-- Tax Deductible -->
                <div class="relative group p-4 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-emerald-500/50 transition-all duration-300">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_tax_deductible" class="sr-only peer" {{ old('is_tax_deductible', $expense->is_tax_deductible) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        </label>
                    </div>
                    <p class="font-semibold text-white">Tax Deductible</p>
                    <p class="text-xs text-slate-400">Eligible for tax</p>
                </div>

                <!-- Billable -->
                <div class="relative group p-4 bg-slate-800/50 rounded-xl border border-slate-700/50 hover:border-sky-500/50 transition-all duration-300">
                    <div class="flex items-center justify-between mb-2">
                        <div class="w-10 h-10 rounded-lg bg-sky-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_billable" class="sr-only peer" {{ old('is_billable', $expense->is_billable) ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-sky-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-sky-500"></div>
                        </label>
                    </div>
                    <p class="font-semibold text-white">Billable</p>
                    <p class="text-xs text-slate-400">Charge to client</p>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6 border-t border-slate-700/50">
            <a href="{{ route('admin.expenses.index') }}" 
               class="px-6 py-3 rounded-xl bg-slate-800 border border-slate-600/50 text-slate-300 font-medium hover:bg-slate-700 hover:text-white hover:border-slate-500 transition-all duration-300 shadow-lg shadow-black/20">
                Cancel
            </a>
            
            <button type="submit"  
                    class="group relative inline-flex items-center gap-2 px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute inset-0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000 bg-gradient-to-r from-transparent via-white/20 to-transparent"></div>
                <div class="relative flex items-center gap-2">
                    <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0l-4 4m4-4v12"/>
                    </svg>
                    Update Expense
                </div>
            </button>
        </div>
    </form>
</div>
@endsection
