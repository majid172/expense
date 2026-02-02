@extends('layouts.admin')

@section('title', 'Reports')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Reports</h1>
            <p class="text-slate-400 mt-1">Analyze your expense data and generate insights</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <button class="group inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700/50 text-slate-300 hover:text-white hover:border-emerald-500/30 transition-all">
                <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                <span>Export CSV</span>
            </button>
            <button class="group inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-800/80 border border-slate-700/50 text-slate-300 hover:text-white hover:border-rose-500/30 transition-all">
                <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
                <span>Export PDF</span>
            </button>
        </div>
    </div>

    <!-- Filters -->
    <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Date Range -->
            <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-3">
                <div class="relative">
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Start Date</label>
                    <input type="date" value="2026-01-01" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                </div>
                <div class="relative">
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">End Date</label>
                    <input type="date" value="2026-02-02" class="w-full px-4 py-2.5 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all">
                </div>
            </div>
            
            <!-- Category & Status -->
            <div class="flex flex-col sm:flex-row gap-3">
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Category</label>
                    <select class="px-4 py-2.5 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all min-w-[150px]">
                        <option>All Categories</option>
                        <option>Equipment</option>
                        <option>Travel</option>
                        <option>Software</option>
                        <option>Supplies</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-medium text-slate-400 mb-1.5">Status</label>
                    <select class="px-4 py-2.5 bg-slate-800/80 border border-slate-700/50 rounded-xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all min-w-[140px]">
                        <option>All Status</option>
                        <option>Approved</option>
                        <option>Pending</option>
                        <option>Rejected</option>
                    </select>
                </div>
                <div class="flex items-end">
                    <button class="px-6 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white font-medium rounded-xl shadow-lg shadow-indigo-500/25 transition-all hover:shadow-indigo-500/40">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Stats -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-indigo-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-indigo-500/20 transition-colors"></div>
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-white">24</p>
                <p class="text-sm text-slate-400 mt-1">Total Expenses</p>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-emerald-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-emerald-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-emerald-500/20 transition-colors"></div>
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-white">$8,745</p>
                <p class="text-sm text-slate-400 mt-1">Total Amount</p>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-amber-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-amber-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-amber-500/20 transition-colors"></div>
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-white">$364</p>
                <p class="text-sm text-slate-400 mt-1">Average Expense</p>
            </div>
        </div>

        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-violet-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-violet-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-violet-500/20 transition-colors"></div>
            <div class="relative">
                <div class="w-10 h-10 rounded-xl bg-violet-500/20 flex items-center justify-center mb-3">
                    <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <p class="text-2xl lg:text-3xl font-bold text-white">6</p>
                <p class="text-sm text-slate-400 mt-1">Categories Used</p>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <!-- Expense Trend Chart -->
        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-white">Expense Trend</h2>
                    <p class="text-sm text-slate-400">Monthly comparison</p>
                </div>
                <div class="flex items-center gap-2 p-1 rounded-lg bg-slate-800/50">
                    <button class="px-3 py-1.5 text-xs font-medium rounded-md bg-indigo-500 text-white">Weekly</button>
                    <button class="px-3 py-1.5 text-xs font-medium rounded-md text-slate-400 hover:text-white transition-colors">Monthly</button>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="flex items-end justify-between gap-2 h-48">
                <div class="flex-1 flex flex-col items-center gap-2">
                    <div class="w-full max-w-[40px] mx-auto bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-16 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer"></div>
                    <span class="text-[10px] sm:text-xs text-slate-400">Week 1</span>
                </div>
                <div class="flex-1 flex flex-col items-center gap-2">
                    <div class="w-full max-w-[40px] mx-auto bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-28 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer"></div>
                    <span class="text-[10px] sm:text-xs text-slate-400">Week 2</span>
                </div>
                <div class="flex-1 flex flex-col items-center gap-2">
                    <div class="w-full max-w-[40px] mx-auto bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-20 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer"></div>
                    <span class="text-[10px] sm:text-xs text-slate-400">Week 3</span>
                </div>
                <div class="flex-1 flex flex-col items-center gap-2">
                    <div class="w-full max-w-[40px] mx-auto bg-gradient-to-t from-emerald-500/50 to-emerald-500 rounded-t-lg h-36 hover:from-emerald-500/70 hover:to-emerald-400 transition-all cursor-pointer ring-2 ring-emerald-500/50 ring-offset-2 ring-offset-slate-800"></div>
                    <span class="text-[10px] sm:text-xs text-white font-medium">Week 4</span>
                </div>
            </div>
        </div>

        <!-- Category Distribution -->
        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-white">Category Distribution</h2>
                    <p class="text-sm text-slate-400">Spending by category</p>
                </div>
            </div>

            <!-- Donut Chart with Legend -->
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="relative w-36 h-36 flex-shrink-0">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="10" class="text-slate-700/50"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#grad1)" stroke-width="10" stroke-dasharray="88 163" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#grad2)" stroke-width="10" stroke-dasharray="50 201" stroke-dashoffset="-88" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#grad3)" stroke-width="10" stroke-dasharray="38 213" stroke-dashoffset="-138" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#grad4)" stroke-width="10" stroke-dasharray="25 226" stroke-dashoffset="-176" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="grad1"><stop stop-color="#818cf8"/><stop offset="1" stop-color="#a78bfa"/></linearGradient>
                            <linearGradient id="grad2"><stop stop-color="#34d399"/><stop offset="1" stop-color="#22d3ee"/></linearGradient>
                            <linearGradient id="grad3"><stop stop-color="#fbbf24"/><stop offset="1" stop-color="#f97316"/></linearGradient>
                            <linearGradient id="grad4"><stop stop-color="#38bdf8"/><stop offset="1" stop-color="#3b82f6"/></linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <p class="text-xl font-bold text-white">$8.7K</p>
                            <p class="text-[10px] text-slate-400">Total</p>
                        </div>
                    </div>
                </div>

                <div class="flex-1 space-y-3 w-full">
                    <div class="flex items-center justify-between p-2.5 rounded-lg bg-slate-800/50 hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-indigo-400 to-violet-400"></div>
                            <span class="text-sm text-slate-300">Equipment</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-semibold text-white">$3,045</span>
                            <span class="text-xs text-slate-400 ml-1">35%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-2.5 rounded-lg bg-slate-800/50 hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-emerald-400 to-cyan-400"></div>
                            <span class="text-sm text-slate-300">Travel</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-semibold text-white">$2,100</span>
                            <span class="text-xs text-slate-400 ml-1">24%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-2.5 rounded-lg bg-slate-800/50 hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-amber-400 to-orange-400"></div>
                            <span class="text-sm text-slate-300">Supplies</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-semibold text-white">$1,580</span>
                            <span class="text-xs text-slate-400 ml-1">18%</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-2.5 rounded-lg bg-slate-800/50 hover:bg-slate-700/50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-sky-400 to-blue-400"></div>
                            <span class="text-sm text-slate-300">Software</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-semibold text-white">$1,020</span>
                            <span class="text-xs text-slate-400 ml-1">12%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Breakdown & Top Expenses -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Status Breakdown -->
        <div class="p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
            <h2 class="text-lg font-semibold text-white mb-5">Status Breakdown</h2>
            
            <div class="space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                            <span class="text-sm text-slate-300">Approved</span>
                        </div>
                        <span class="text-sm font-semibold text-white">18 <span class="text-slate-400 font-normal">(75%)</span></span>
                    </div>
                    <div class="h-2 bg-slate-700/50 rounded-full overflow-hidden">
                        <div class="h-full w-3/4 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                            <span class="text-sm text-slate-300">Pending</span>
                        </div>
                        <span class="text-sm font-semibold text-white">5 <span class="text-slate-400 font-normal">(21%)</span></span>
                    </div>
                    <div class="h-2 bg-slate-700/50 rounded-full overflow-hidden">
                        <div class="h-full w-1/5 bg-gradient-to-r from-amber-500 to-amber-400 rounded-full"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                            <span class="text-sm text-slate-300">Rejected</span>
                        </div>
                        <span class="text-sm font-semibold text-white">1 <span class="text-slate-400 font-normal">(4%)</span></span>
                    </div>
                    <div class="h-2 bg-slate-700/50 rounded-full overflow-hidden">
                        <div class="h-full w-[4%] bg-gradient-to-r from-rose-500 to-rose-400 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Expenses -->
        <div class="xl:col-span-2 p-5 sm:p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-lg font-semibold text-white">Top Expenses</h2>
                <span class="text-xs text-slate-400">Highest amounts this period</span>
            </div>
            
            <div class="overflow-x-auto -mx-5 sm:-mx-6 px-5 sm:px-6">
                <table class="w-full min-w-[500px]">
                    <thead>
                        <tr class="text-left border-b border-slate-700/50">
                            <th class="pb-3 text-xs font-medium text-slate-400 uppercase tracking-wider">Expense</th>
                            <th class="pb-3 text-xs font-medium text-slate-400 uppercase tracking-wider">Category</th>
                            <th class="pb-3 text-xs font-medium text-slate-400 uppercase tracking-wider">Date</th>
                            <th class="pb-3 text-xs font-medium text-slate-400 uppercase tracking-wider text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/30">
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-white">MacBook Pro M3</span>
                                </div>
                            </td>
                            <td class="py-3"><span class="px-2 py-1 rounded-md text-xs font-medium bg-indigo-500/20 text-indigo-400">Equipment</span></td>
                            <td class="py-3 text-sm text-slate-400">Jan 28, 2026</td>
                            <td class="py-3 text-right font-semibold text-white">$2,499.00</td>
                        </tr>
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-white">Client Meeting - NYC</span>
                                </div>
                            </td>
                            <td class="py-3"><span class="px-2 py-1 rounded-md text-xs font-medium bg-emerald-500/20 text-emerald-400">Travel</span></td>
                            <td class="py-3 text-sm text-slate-400">Jan 25, 2026</td>
                            <td class="py-3 text-right font-semibold text-white">$845.00</td>
                        </tr>
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-white">GitHub Enterprise</span>
                                </div>
                            </td>
                            <td class="py-3"><span class="px-2 py-1 rounded-md text-xs font-medium bg-sky-500/20 text-sky-400">Software</span></td>
                            <td class="py-3 text-sm text-slate-400">Jan 22, 2026</td>
                            <td class="py-3 text-right font-semibold text-white">$420.00</td>
                        </tr>
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="py-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-white">Team Lunch</span>
                                </div>
                            </td>
                            <td class="py-3"><span class="px-2 py-1 rounded-md text-xs font-medium bg-rose-500/20 text-rose-400">Food</span></td>
                            <td class="py-3 text-sm text-slate-400">Jan 18, 2026</td>
                            <td class="py-3 text-right font-semibold text-white">$234.50</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
