@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Welcome back, John! 👋</h1>
            <p class="text-slate-400 mt-1">Here's what's happening with your expenses today.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="px-4 py-2 rounded-xl bg-slate-800/50 border border-slate-700/50 text-sm text-slate-400">
                <span class="text-slate-500">Today:</span> 
                <span class="text-white font-medium">Feb 2, 2026</span>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Total Expenses -->
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-indigo-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-indigo-500/20 transition-colors"></div>
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/25">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-medium text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded-full">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        12%
                    </span>
                </div>
                <div class="mt-4">
                    <p class="text-3xl font-bold text-white">$24,580</p>
                    <p class="text-sm text-slate-400 mt-1">Total Expenses</p>
                </div>
            </div>
        </div>

        <!-- This Month -->
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-emerald-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-emerald-500/20 transition-colors"></div>
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-medium text-rose-400 bg-rose-500/10 px-2 py-1 rounded-full">
                        <svg class="w-3 h-3 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        8%
                    </span>
                </div>
                <div class="mt-4">
                    <p class="text-3xl font-bold text-white">$4,250</p>
                    <p class="text-sm text-slate-400 mt-1">This Month</p>
                </div>
            </div>
        </div>

        <!-- Pending Approval -->
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-amber-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-amber-500/20 transition-colors"></div>
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/25">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="flex items-center gap-1 text-xs font-medium text-amber-400 bg-amber-500/10 px-2 py-1 rounded-full animate-pulse">
                        Pending
                    </span>
                </div>
                <div class="mt-4">
                    <p class="text-3xl font-bold text-white">5</p>
                    <p class="text-sm text-slate-400 mt-1">Pending Approval</p>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="group relative p-5 rounded-2xl bg-gradient-to-br from-slate-800/80 to-slate-900/80 border border-slate-700/50 hover:border-violet-500/30 transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-violet-500/10 rounded-full blur-2xl -translate-y-1/2 translate-x-1/2 group-hover:bg-violet-500/20 transition-colors"></div>
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-violet-400 to-purple-500 flex items-center justify-center shadow-lg shadow-violet-500/25">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-3xl font-bold text-white">8</p>
                    <p class="text-sm text-slate-400 mt-1">Active Categories</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <!-- Recent Expenses -->
        <div class="xl:col-span-2 p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-semibold text-white">Recent Expenses</h2>
                    <p class="text-sm text-slate-400">Your latest transactions</p>
                </div>
                <a href="{{ route('admin.expenses.index') }}" class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors flex items-center gap-1">
                    View all
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <div class="space-y-3">
                <!-- Expense Item 1 -->
                <div class="group flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-700/50 border border-transparent hover:border-slate-600/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-white truncate">MacBook Pro M3</p>
                        <p class="text-sm text-slate-400">Equipment • Jan 28, 2026</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-white">$2,499.00</p>
                        <span class="inline-flex items-center text-xs font-medium text-emerald-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5"></span>
                            Approved
                        </span>
                    </div>
                </div>

                <!-- Expense Item 2 -->
                <div class="group flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-700/50 border border-transparent hover:border-slate-600/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-white truncate">Client Meeting - NYC</p>
                        <p class="text-sm text-slate-400">Travel • Jan 25, 2026</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-white">$845.00</p>
                        <span class="inline-flex items-center text-xs font-medium text-amber-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-1.5 animate-pulse"></span>
                            Pending
                        </span>
                    </div>
                </div>

                <!-- Expense Item 3 -->
                <div class="group flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-700/50 border border-transparent hover:border-slate-600/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center shadow-lg shadow-sky-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-white truncate">GitHub Enterprise</p>
                        <p class="text-sm text-slate-400">Software • Jan 22, 2026</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-white">$420.00</p>
                        <span class="inline-flex items-center text-xs font-medium text-emerald-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5"></span>
                            Approved
                        </span>
                    </div>
                </div>

                <!-- Expense Item 4 -->
                <div class="group flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-700/50 border border-transparent hover:border-slate-600/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-white truncate">Office Supplies</p>
                        <p class="text-sm text-slate-400">Supplies • Jan 20, 2026</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-white">$156.00</p>
                        <span class="inline-flex items-center text-xs font-medium text-emerald-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-1.5"></span>
                            Approved
                        </span>
                    </div>
                </div>

                <!-- Expense Item 5 -->
                <div class="group flex items-center gap-4 p-4 rounded-xl bg-slate-800/50 hover:bg-slate-700/50 border border-transparent hover:border-slate-600/50 transition-all">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center shadow-lg shadow-rose-500/20">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-white truncate">Team Lunch</p>
                        <p class="text-sm text-slate-400">Food • Jan 18, 2026</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-white">$234.50</p>
                        <span class="inline-flex items-center text-xs font-medium text-rose-400">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400 mr-1.5"></span>
                            Rejected
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Category Breakdown -->
            <div class="p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-white">Category Breakdown</h2>
                        <p class="text-sm text-slate-400">This month spending</p>
                    </div>
                </div>

                <!-- Donut Chart Placeholder -->
                <div class="relative w-40 h-40 mx-auto mb-6">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="12" class="text-slate-700/50"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient1)" stroke-width="12" stroke-dasharray="100 151.2" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient2)" stroke-width="12" stroke-dasharray="60 191.2" stroke-dashoffset="-100" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient3)" stroke-width="12" stroke-dasharray="45 206.2" stroke-dashoffset="-160" stroke-linecap="round"/>
                        <circle cx="50" cy="50" r="40" fill="none" stroke="url(#gradient4)" stroke-width="12" stroke-dasharray="30 221.2" stroke-dashoffset="-205" stroke-linecap="round"/>
                        <defs>
                            <linearGradient id="gradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#818cf8"/>
                                <stop offset="100%" stop-color="#a78bfa"/>
                            </linearGradient>
                            <linearGradient id="gradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#34d399"/>
                                <stop offset="100%" stop-color="#22d3ee"/>
                            </linearGradient>
                            <linearGradient id="gradient3" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#fbbf24"/>
                                <stop offset="100%" stop-color="#f97316"/>
                            </linearGradient>
                            <linearGradient id="gradient4" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#38bdf8"/>
                                <stop offset="100%" stop-color="#3b82f6"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-white">$4.2K</p>
                            <p class="text-xs text-slate-400">Total</p>
                        </div>
                    </div>
                </div>

                <!-- Legend -->
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-indigo-400 to-violet-400"></div>
                            <span class="text-sm text-slate-300">Equipment</span>
                        </div>
                        <span class="text-sm font-medium text-white">40%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-emerald-400 to-cyan-400"></div>
                            <span class="text-sm text-slate-300">Travel</span>
                        </div>
                        <span class="text-sm font-medium text-white">25%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-amber-400 to-orange-400"></div>
                            <span class="text-sm text-slate-300">Supplies</span>
                        </div>
                        <span class="text-sm font-medium text-white">20%</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r from-sky-400 to-blue-400"></div>
                            <span class="text-sm text-slate-300">Software</span>
                        </div>
                        <span class="text-sm font-medium text-white">15%</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
                <h2 class="text-lg font-semibold text-white mb-4">Quick Actions</h2>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.expenses.create') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-800/50 hover:bg-indigo-500/10 border border-transparent hover:border-indigo-500/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-indigo-500/20 flex items-center justify-center group-hover:bg-indigo-500/30 transition-colors">
                            <svg class="w-5 h-5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-300 group-hover:text-white transition-colors">Add Expense</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-800/50 hover:bg-emerald-500/10 border border-transparent hover:border-emerald-500/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center group-hover:bg-emerald-500/30 transition-colors">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-300 group-hover:text-white transition-colors">Reports</span>
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-800/50 hover:bg-amber-500/10 border border-transparent hover:border-amber-500/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-amber-500/20 flex items-center justify-center group-hover:bg-amber-500/30 transition-colors">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-300 group-hover:text-white transition-colors">Categories</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="group flex flex-col items-center gap-2 p-4 rounded-xl bg-slate-800/50 hover:bg-violet-500/10 border border-transparent hover:border-violet-500/30 transition-all">
                        <div class="w-10 h-10 rounded-xl bg-violet-500/20 flex items-center justify-center group-hover:bg-violet-500/30 transition-colors">
                            <svg class="w-5 h-5 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-medium text-slate-300 group-hover:text-white transition-colors">Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Overview Chart -->
    <div class="p-6 rounded-2xl bg-gradient-to-br from-slate-800/50 to-slate-900/50 border border-slate-700/50">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-lg font-semibold text-white">Monthly Overview</h2>
                <p class="text-sm text-slate-400">Expense trends over the last 6 months</p>
            </div>
            <div class="flex items-center gap-2 p-1 rounded-lg bg-slate-800/50">
                <button class="px-3 py-1.5 text-sm font-medium rounded-md bg-indigo-500 text-white">Expenses</button>
                <button class="px-3 py-1.5 text-sm font-medium rounded-md text-slate-400 hover:text-white transition-colors">Categories</button>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="flex items-end justify-between gap-2 sm:gap-4 h-48">
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-24 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer group">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$3,200</div>
                    </div>
                </div>
                <span class="text-xs text-slate-400">Sep</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-32 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer group">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$4,100</div>
                    </div>
                </div>
                <span class="text-xs text-slate-400">Oct</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-28 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer group">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$3,800</div>
                    </div>
                </div>
                <span class="text-xs text-slate-400">Nov</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-emerald-500/50 to-emerald-500 rounded-t-lg h-44 hover:from-emerald-500/70 hover:to-emerald-400 transition-all cursor-pointer group">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$5,500</div>
                    </div>
                </div>
                <span class="text-xs text-slate-400">Dec</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-indigo-500/50 to-indigo-500 rounded-t-lg h-36 hover:from-indigo-500/70 hover:to-indigo-400 transition-all cursor-pointer group">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$4,700</div>
                    </div>
                </div>
                <span class="text-xs text-slate-400">Jan</span>
            </div>
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="relative w-full flex justify-center">
                    <div class="w-8 sm:w-12 bg-gradient-to-t from-purple-500/50 to-purple-500 rounded-t-lg h-[168px] hover:from-purple-500/70 hover:to-purple-400 transition-all cursor-pointer group ring-2 ring-purple-500/50 ring-offset-2 ring-offset-slate-800">
                        <div class="absolute -top-8 left-1/2 -translate-x-1/2 px-2 py-1 bg-slate-700 rounded text-xs text-white opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">$4,250</div>
                    </div>
                </div>
                <span class="text-xs text-white font-medium">Feb</span>
            </div>
        </div>
    </div>
</div>
@endsection
