@extends('layouts.admin')

@section('title', 'Expense Categories')

@section('content')
<div class="space-y-6">
    <!-- Flash Messages -->
    @if(session('success'))
    <div class="glass-card p-4 border-emerald-500/50 bg-emerald-500/10" x-data="{ show: true }" x-show="show" x-transition>
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p class="text-emerald-400 font-medium">{{ session('success') }}</p>
            </div>
            <button @click="show = false" class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if($errors->any())
    <div class="glass-card p-4 border-rose-500/50 bg-rose-500/10">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center">
                <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-rose-400 font-medium">Please fix the following errors:</p>
                <ul class="text-rose-300 text-sm mt-1 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif

    <!-- Page Header & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Expense Categories</h1>
            <p class="text-slate-400 mt-1">Manage specific types of expenses</p>
        </div>
        <button onclick="document.getElementById('addExpenseCategoryModal').classList.remove('hidden')" class="btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Expense Category
        </button>
    </div>

    <!-- Expense Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($expenseCategories as $item)
        <div class="glass-card p-6 flex flex-col justify-between group hover:border-slate-500/50 transition-all">
            <div>
                <div class="flex items-start justify-between mb-4">
                    <!-- Parent Category Badge -->
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br {{ $item->category->gradient_classes }} flex items-center justify-center shadow-lg {{ $item->category->shadow_class }}">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item->category->icon_path }}"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider">Parent Category</span>
                            <p class="text-sm font-semibold text-white">{{ $item->category->name }}</p>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="flex opacity-0 group-hover:opacity-100 transition-opacity">
                         <button onclick="openEditModal({{ $item->id }}, {{ json_encode($item) }})" class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <button onclick="openDeleteModal({{ $item->id }}, '{{ $item->category->name }} - {{ $item->type }}')" class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                         <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-indigo-500/20 text-indigo-400 border border-indigo-500/20">
                            {{ ucfirst($item->type) }}
                        </span>
                        <span class="text-xs {{ $item->status ? 'text-emerald-400' : 'text-slate-500' }}">
                            {{ $item->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <p class="text-slate-300 text-sm line-clamp-2 min-h-[2.5rem]">{{ $item->description ?: 'No description provided.' }}</p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-700/50 text-xs text-slate-500 flex justify-between">
                <span>Created {{ $item->created_at->format('M d, Y') }}</span>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="glass-card p-12 text-center">
                <div class="w-20 h-20 rounded-2xl bg-slate-700/50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">No expense categories yet</h3>
                <p class="text-slate-400 mb-6">Define specific expense types linked to your main categories.</p>
                <button onclick="document.getElementById('addExpenseCategoryModal').classList.remove('hidden')" class="btn-primary inline-flex">
                    Add Expense Category
                </button>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Create Modal -->
<div id="addExpenseCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-lg p-0 animate-fade-in-up overflow-hidden">
        <div class="relative px-6 pt-6 pb-4 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 border-b border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-lg shadow-emerald-500/30">
                     <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                </div>
                <div>
                     <h3 class="text-xl font-bold text-white">New Expense Category</h3>
                    <p class="text-sm text-slate-400">Define a specific expense type</p>
                </div>
            </div>
            <button onclick="document.getElementById('addExpenseCategoryModal').classList.add('hidden')" class="absolute top-4 right-4 text-slate-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <form action="{{ route('admin.expense-categories.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            
            <!-- Parent Category Select -->
            <div class="relative group">
                <label for="category_id" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Parent Category
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </div>
                        <select name="category_id" class="w-full pl-12 pr-10 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:bg-slate-800/90 appearance-none transition-all duration-300" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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

            <!-- Type (Expense Name) -->
            <div class="relative group">
                <label for="type" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Expense Name
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <!-- Gradient Border Wrapper -->
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                    <div class="relative flex items-center">
                        <div class="absolute left-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <input type="text" name="type" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-slate-800/90 transition-all duration-300" 
                            placeholder="e.g. Monthly Rent" 
                            required>
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Specific name for this expense category
                </p>
            </div>

            <!-- Description -->
            <div class="relative group">
                <label for="description" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-slate-600 to-slate-700 shadow-lg">
                            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </span>
                        Description
                        <span class="text-[10px] font-medium text-slate-500 bg-slate-700/50 px-2 py-0.5 rounded-full">Optional</span>
                    </span>
                </label>
                <div class="relative">
                    <div class="absolute left-4 top-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-500 group-focus-within:text-slate-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <textarea name="description" rows="3" 
                        class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-slate-500 focus:bg-slate-800/90 hover:border-slate-500/70 transition-all duration-300 resize-none" 
                        placeholder="What kind of expenses go here?"></textarea>
                </div>
            </div>

            <!-- Status Switch -->
            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-slate-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">Active Status</p>
                        <p class="text-xs text-slate-400">Enable or disable this category</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" value="1" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                </label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('addExpenseCategoryModal').classList.add('hidden')" class="btn-secondary flex-1">Cancel</button>
                <button type="submit" class="btn-primary flex-1">Create Category</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div id="editExpenseCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-lg p-0 animate-fade-in-up">
         <div class="relative px-6 pt-6 pb-4 bg-gradient-to-r from-indigo-500/10 to-blue-500/10 border-b border-slate-700/50">
             <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Expense Category</h3>
                <button onclick="document.getElementById('editExpenseCategoryModal').classList.add('hidden')" class="text-slate-400 hover:text-white"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
            </div>
        </div>
        <form id="editExpenseCategoryForm" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
             <!-- Parent Category Select -->
            <div class="relative group">
                <label for="edit_category_id" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-600 shadow-lg shadow-emerald-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Parent Category
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 via-teal-500 to-cyan-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                    <div class="relative">
                        <div class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-emerald-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </div>
                        <select name="category_id" id="edit_category_id" class="w-full pl-12 pr-10 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-emerald-500 focus:bg-slate-800/90 appearance-none transition-all duration-300" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
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

            <!-- Type (Expense Name) -->
            <div class="relative group">
                <label for="edit_type" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Expense Name
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <!-- Gradient Border Wrapper -->
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                    <div class="relative flex items-center">
                        <div class="absolute left-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <input type="text" id="edit_type" name="type" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-slate-800/90 transition-all duration-300" 
                            placeholder="e.g. Monthly Rent" 
                            required>
                    </div>
                </div>
            </div>

             <!-- Description -->
            <div class="relative group">
                <label for="edit_description" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-slate-600 to-slate-700 shadow-lg">
                            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                        </span>
                        Description
                        <span class="text-[10px] font-medium text-slate-500 bg-slate-700/50 px-2 py-0.5 rounded-full">Optional</span>
                    </span>
                </label>
                <div class="relative">
                    <div class="absolute left-4 top-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-500 group-focus-within:text-slate-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <textarea name="description" id="edit_description" rows="3" 
                        class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-slate-500 focus:bg-slate-800/90 hover:border-slate-500/70 transition-all duration-300 resize-none"></textarea>
                </div>
            </div>

             <!-- Status Switch -->
            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl border border-slate-700/50">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-white">Active Status</p>
                        <p class="text-xs text-slate-400">Enable or disable this category</p>
                    </div>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="status" id="edit_status" value="1" class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-emerald-500/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                </label>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('editExpenseCategoryModal').classList.add('hidden')" class="btn-secondary flex-1">Cancel</button>
                <button type="submit" class="btn-primary flex-1">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteExpenseCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-sm p-6 animate-fade-in-up">
        <div class="text-center">
            <div class="w-16 h-16 rounded-2xl bg-rose-500/20 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Delete Category</h3>
            <p class="text-slate-400 mb-6">Are you sure you want to delete <span id="deleteItemName" class="text-white font-medium"></span>?</p>
            <form id="deleteExpenseCategoryForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex gap-3">
                    <button type="button" onclick="document.getElementById('deleteExpenseCategoryModal').classList.add('hidden')" class="btn-secondary flex-1">Cancel</button>
                    <button type="submit" class="w-full py-3 px-4 bg-rose-500 hover:bg-rose-600 text-white rounded-xl font-semibold shadow-lg shadow-rose-500/20 transition-all flex-1">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openEditModal(id, data) {
        const form = document.getElementById('editExpenseCategoryForm');
        form.action = `{{ url('admin/expense-categories') }}/${id}`;
        
        document.getElementById('edit_category_id').value = data.category_id;
        document.getElementById('edit_type').value = data.type;
        document.getElementById('edit_description').value = data.description || '';
        document.getElementById('edit_status').checked = data.status;
        
        document.getElementById('editExpenseCategoryModal').classList.remove('hidden');
    }

    function openDeleteModal(id, name) {
        const form = document.getElementById('deleteExpenseCategoryForm');
        form.action = `{{ url('admin/expense-categories') }}/${id}`;
        document.getElementById('deleteItemName').textContent = name;
        document.getElementById('deleteExpenseCategoryModal').classList.remove('hidden');
    }
</script>
@endsection
