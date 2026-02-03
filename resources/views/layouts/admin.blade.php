<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Expense Manager</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Heroicons -->
    <script src="https://unpkg.com/@heroicons/v2.0.18/24/outline/esm/index.js" type="module"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-900 text-slate-100 font-sans antialiased overflow-hidden">
    <div class="h-screen flex" x-data="{ sidebarOpen: false }">
        
        <!-- Mobile Sidebar Overlay -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-40 lg:hidden"
             @click="sidebarOpen = false">
        </div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-50 w-72 h-screen transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:relative lg:inset-0">
            
            <!-- Sidebar Background with Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-900/20 via-transparent to-transparent"></div>
            <div class="absolute inset-y-0 right-0 w-px bg-gradient-to-b from-transparent via-indigo-500/50 to-transparent"></div>
            
            <div class="relative h-full flex flex-col">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3 px-6 py-6">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-40 group-hover:opacity-75 transition duration-300"></div>
                        <div class="relative w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-2xl">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">ExpenseHub</h1>
                        <p class="text-xs text-indigo-400 font-medium">Admin Dashboard</p>
                    </div>
                    <button @click="sidebarOpen = false" class="lg:hidden ml-auto p-2 rounded-lg hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Divider with glow -->
                <div class="flex-shrink-0 mx-4 h-px bg-gradient-to-r from-transparent via-slate-600 to-transparent"></div>

                <!-- Navigation - Scrollable -->
                <nav class="flex-1 p-4 space-y-2 overflow-y-auto min-h-0" style="scrollbar-width: thin; scrollbar-color: #334155 transparent;">
                    <style>
                        nav::-webkit-scrollbar { width: 6px; }
                        nav::-webkit-scrollbar-track { background: transparent; }
                        nav::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
                        nav::-webkit-scrollbar-thumb:hover { background: #475569; }
                    </style>
                    <p class="px-4 py-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">Main Menu</p>
                    
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.dashboard'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400 group-hover:text-indigo-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="font-medium">Dashboard</span>
                    </a>

                    <!-- Expenses -->
                    <a href="{{ route('admin.expenses.index') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.expenses.*') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.expenses.*'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.expenses.*') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.expenses.*') ? 'text-white' : 'text-slate-400 group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                            </svg>
                        </div>
                        <span class="font-medium">Expenses</span>
                        <span class="ml-auto flex items-center justify-center min-w-[24px] h-6 px-2 bg-indigo-500/20 text-indigo-400 text-xs font-bold rounded-full ring-1 ring-indigo-500/30">12</span>
                    </a>

                    <!-- Categories -->
                    <a href="{{ route('admin.categories.index') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.categories.*'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.categories.*') ? 'text-white' : 'text-slate-400 group-hover:text-amber-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <span class="font-medium">Categories</span>
                    </a>

                    <!-- Expense Categories -->
                    <a href="{{ route('admin.expense-categories.index') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.expense-categories.*') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.expense-categories.*'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.expense-categories.*') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.expense-categories.*') ? 'text-white' : 'text-slate-400 group-hover:text-sky-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <span class="font-medium">Ex Categories</span>
                    </a>

                    <!-- Reports -->
                    <a href="{{ route('admin.reports.index') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.reports.*') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.reports.*'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.reports.*') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.reports.*') ? 'text-white' : 'text-slate-400 group-hover:text-sky-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <span class="font-medium">Reports</span>
                    </a>

                    <div class="pt-4">
                        <div class="mx-2 h-px bg-gradient-to-r from-transparent via-slate-700 to-transparent"></div>
                    </div>

                    <p class="px-4 py-2 text-[10px] font-bold text-slate-500 uppercase tracking-widest">System</p>

                    <!-- Settings -->
                    <a href="{{ route('admin.settings') }}" class="group relative flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('admin.settings') ? 'bg-gradient-to-r from-indigo-500/20 to-purple-500/10 text-white' : 'text-slate-400 hover:text-white hover:bg-white/5' }}">
                        @if(request()->routeIs('admin.settings'))
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-8 bg-gradient-to-b from-indigo-400 to-purple-500 rounded-r-full shadow-lg shadow-indigo-500/50"></div>
                        @endif
                        <div class="w-10 h-10 rounded-xl {{ request()->routeIs('admin.settings') ? 'bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30' : 'bg-slate-800 group-hover:bg-slate-700' }} flex items-center justify-center transition-all duration-300">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.settings') ? 'text-white' : 'text-slate-400 group-hover:text-rose-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <span class="font-medium">Settings</span>
                    </a>
                </nav>

                <!-- User Card at Bottom - Fixed -->
                <div class="flex-shrink-0 p-4 border-t border-slate-700/50">
                    <div class="relative group cursor-pointer">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-300"></div>
                        <div class="relative flex items-center gap-3 p-4 rounded-xl bg-slate-800/80 border border-slate-700/50 hover:border-indigo-500/30 transition-all duration-300">
                            <div class="relative">
                                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center text-white font-bold shadow-lg shadow-emerald-500/20">
                                    JD
                                </div>
                                <div class="absolute -bottom-0.5 -right-0.5 w-3.5 h-3.5 bg-emerald-500 rounded-full border-2 border-slate-800"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-semibold text-white truncate">John Doe</p>
                                <p class="text-xs text-slate-400 truncate">Administrator</p>
                            </div>
                            <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-slate-700/50 group-hover:bg-indigo-500/20 transition-colors">
                                <svg class="w-4 h-4 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content - Scrollable -->
        <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden lg:ml-0">
            <!-- Header - Fixed -->
            <header class="flex-shrink-0 z-30 bg-slate-900/80 backdrop-blur-xl border-b border-slate-700/50">
                <div class="flex items-center justify-between px-4 lg:px-8 py-4">
                    <!-- Mobile Menu Button -->
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg hover:bg-slate-700/50 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <!-- Search Bar -->
                    <div class="hidden md:flex flex-1 max-w-md">
                        <div class="relative w-full">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" 
                                   placeholder="Search expenses, categories..." 
                                   class="w-full pl-10 pr-4 py-2.5 bg-slate-800/50 border border-slate-700/50 rounded-xl text-sm text-slate-100 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 focus:border-transparent transition-all">
                        </div>
                    </div>

                    <!-- Right Actions -->
                    <div class="flex items-center gap-2 lg:gap-4">
                        <!-- Mobile Search -->
                        <button class="md:hidden p-2 rounded-lg hover:bg-slate-700/50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>

                        <!-- Notifications -->
                        <button class="relative p-2 rounded-lg hover:bg-slate-700/50 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-slate-900"></span>
                        </button>

                        <!-- Add New Button -->
                        <a href="{{ route('admin.expenses.create') }}" class="hidden sm:flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white text-sm font-medium rounded-xl shadow-lg shadow-indigo-500/25 transition-all hover:shadow-indigo-500/40 hover:scale-[1.02]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Add Expense</span>
                        </a>

                        <!-- Mobile Add Button -->
                        <a href="{{ route('admin.expenses.create') }}" class="sm:hidden p-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Wrapper -->
            <div class="flex-1 overflow-y-auto" style="scrollbar-width: thin; scrollbar-color: #334155 transparent;">
                <style>
                    .flex-1.overflow-y-auto::-webkit-scrollbar { width: 8px; }
                    .flex-1.overflow-y-auto::-webkit-scrollbar-track { background: transparent; }
                    .flex-1.overflow-y-auto::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
                    .flex-1.overflow-y-auto::-webkit-scrollbar-thumb:hover { background: #475569; }
                </style>
                
                <!-- Content Wrapper with min-height for sticky footer -->
                <div class="flex flex-col min-h-full">
                    <!-- Page Content -->
                    <main class="flex-1 p-4 lg:p-8">
                        @yield('content')
                    </main>

                    <!-- Footer -->
                    <footer class="border-t border-slate-700/50 px-4 lg:px-8 py-4 mt-auto">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-sm text-slate-400">
                            <p>&copy; {{ date('Y') }} ExpenseHub. All rights reserved.</p>
                            <p>Made with for better expense management</p>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('scripts')
</body>
</html>
