@extends('layouts.admin')

@section('title', 'Expenses')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Expenses</h1>
            <p class="text-slate-400 mt-1">Manage and track all your expenses</p>
        </div>
        <a href="{{ route('admin.expenses.create') }}" class="group relative inline-flex items-center gap-2 px-6 py-3 overflow-hidden rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-medium shadow-lg shadow-indigo-500/25 transition-all hover:shadow-indigo-500/40 hover:scale-[1.02]">
            <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <svg class="relative w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="relative">Add Expense</span>
        </a>
    </div>

    <!-- Stats Row -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="relative group p-4 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 to-purple-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">24</p>
                    <p class="text-xs text-slate-400">Total</p>
                </div>
            </div>
        </div>
        <div class="relative group p-4 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-emerald-500/30 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-cyan-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">18</p>
                    <p class="text-xs text-slate-400">Approved</p>
                </div>
            </div>
        </div>
        <div class="relative group p-4 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-amber-500/30 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-amber-500/5 to-orange-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">5</p>
                    <p class="text-xs text-slate-400">Pending</p>
                </div>
            </div>
        </div>
        <div class="relative group p-4 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-rose-500/30 transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-br from-rose-500/5 to-pink-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-rose-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">1</p>
                    <p class="text-xs text-slate-400">Rejected</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="p-4 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50 backdrop-blur-xl">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Search -->
            <div class="flex-1">
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/20 to-purple-500/20 rounded-xl blur opacity-0 group-focus-within:opacity-100 transition-opacity"></div>
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text" placeholder="Search expenses..." class="w-full pl-12 pr-4 py-3 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-transparent transition-all">
                    </div>
                </div>
            </div>
            
            <!-- Filters -->
            <div class="flex flex-wrap gap-3">
                <select class="px-4 py-3 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all appearance-none cursor-pointer min-w-[140px]">
                    <option value="">All Categories</option>
                    <option>Equipment</option>
                    <option>Travel</option>
                    <option>Software</option>
                    <option>Supplies</option>
                </select>
                <select class="px-4 py-3 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all appearance-none cursor-pointer min-w-[130px]">
                    <option value="">All Status</option>
                    <option>Approved</option>
                    <option>Pending</option>
                    <option>Rejected</option>
                </select>
                <input type="date" class="px-4 py-3 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
            </div>
        </div>
    </div>

    <!-- Expenses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @forelse($expenses as $expense)
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300 hover:shadow-lg hover:shadow-indigo-500/5">
            <div class="absolute top-4 right-4">
                @php
                    $statusColors = [
                        'approved' => 'bg-emerald-500/20 text-emerald-400 ring-emerald-500/30',
                        'pending' => 'bg-amber-500/20 text-amber-400 ring-amber-500/30',
                        'rejected' => 'bg-rose-500/20 text-rose-400 ring-rose-500/30',
                        'draft' => 'bg-slate-500/20 text-slate-400 ring-slate-500/30',
                        'submitted' => 'bg-blue-500/20 text-blue-400 ring-blue-500/30',
                    ];
                    $statusColor = $statusColors[$expense->status] ?? $statusColors['draft'];
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold {{ $statusColor }} ring-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-current mr-2 {{ $expense->status === 'pending' ? 'animate-pulse' : '' }}"></span>
                    {{ ucfirst($expense->status) }}
                </span>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $expense->expenseCategory->category->gradient_classes ?? 'from-indigo-500 to-purple-600' }} flex items-center justify-center shadow-lg shadow-indigo-500/20 flex-shrink-0">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $expense->expenseCategory->category->icon_path ?? 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-lg font-semibold text-white truncate">{{ $expense->title }}</h3>
                    <p class="text-sm text-slate-400 mt-0.5">{{ $expense->expenseCategory->type ?? 'Uncategorized' }} <span class="text-slate-600">•</span> {{ $expense->expenseCategory->category->name ?? '' }}</p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-slate-700/50">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-2xl font-bold text-white">${{ number_format($expense->amount, 2) }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $expense->date->format('M d, Y') }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.expenses.edit', $expense) }}" class="p-2.5 rounded-xl bg-slate-700/50 hover:bg-indigo-500/20 text-slate-400 hover:text-indigo-400 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.expenses.destroy', $expense) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2.5 rounded-xl bg-slate-700/50 hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="glass-card p-12 text-center">
                 <div class="w-20 h-20 rounded-2xl bg-slate-700/50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">No expenses found</h3>
                <p class="text-slate-400 mb-6">Create your first expense entry to get started.</p>
                <a href="{{ route('admin.expenses.create') }}" class="btn-primary inline-flex">
                    Add Expense
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $expenses->links() }}
    </div>
</div>
@endsection
