@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl lg:text-3xl font-bold text-white">Categories</h1>
            <p class="text-slate-400 mt-1">Organize your expenses with categories</p>
        </div>
        <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" class="btn-primary">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Category
        </button>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
        <!-- Equipment -->
        <div class="glass-card p-6 hover:border-indigo-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Equipment</h3>
            <p class="text-sm text-slate-400 mt-1">Hardware, devices, furniture</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">18 expenses</span>
                <span class="text-sm font-semibold text-white">$15,840</span>
            </div>
        </div>

        <!-- Travel -->
        <div class="glass-card p-6 hover:border-emerald-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center shadow-lg shadow-emerald-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Travel</h3>
            <p class="text-sm text-slate-400 mt-1">Flights, hotels, transport</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">12 expenses</span>
                <span class="text-sm font-semibold text-white">$11,250</span>
            </div>
        </div>

        <!-- Software -->
        <div class="glass-card p-6 hover:border-sky-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 flex items-center justify-center shadow-lg shadow-sky-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Software</h3>
            <p class="text-sm text-slate-400 mt-1">Subscriptions, licenses</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">8 expenses</span>
                <span class="text-sm font-semibold text-white">$9,120</span>
            </div>
        </div>

        <!-- Supplies -->
        <div class="glass-card p-6 hover:border-amber-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center shadow-lg shadow-amber-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Supplies</h3>
            <p class="text-sm text-slate-400 mt-1">Office supplies, materials</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">24 expenses</span>
                <span class="text-sm font-semibold text-white">$5,430</span>
            </div>
        </div>

        <!-- Food & Entertainment -->
        <div class="glass-card p-6 hover:border-rose-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-rose-400 to-pink-500 flex items-center justify-center shadow-lg shadow-rose-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Food & Entertainment</h3>
            <p class="text-sm text-slate-400 mt-1">Meals, events, client entertainment</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">15 expenses</span>
                <span class="text-sm font-semibold text-white">$3,591</span>
            </div>
        </div>

        <!-- Utilities -->
        <div class="glass-card p-6 hover:border-violet-500/50 transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-violet-400 to-purple-500 flex items-center justify-center shadow-lg shadow-violet-500/25">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">Utilities</h3>
            <p class="text-sm text-slate-400 mt-1">Internet, phone, electricity</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">6 expenses</span>
                <span class="text-sm font-semibold text-white">$2,840</span>
            </div>
        </div>

        <!-- Add New Category Card -->
        <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" class="glass-card p-6 border-dashed border-2 hover:border-indigo-500/50 transition-all flex flex-col items-center justify-center min-h-[200px] group">
            <div class="w-14 h-14 rounded-xl bg-slate-700/50 group-hover:bg-indigo-500/20 flex items-center justify-center transition-colors">
                <svg class="w-7 h-7 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <p class="text-slate-400 group-hover:text-white mt-4 font-medium transition-colors">Add New Category</p>
        </button>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm" onclick="document.getElementById('addCategoryModal').classList.add('hidden')"></div>
    <div class="relative glass-card w-full max-w-md p-6 animate-fade-in-up">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-white">Add New Category</h3>
            <button onclick="document.getElementById('addCategoryModal').classList.add('hidden')" class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="form-label">Category Name <span class="text-rose-400">*</span></label>
                <input type="text" id="name" name="name" class="form-input" placeholder="e.g., Marketing" required>
            </div>
            
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="3" class="form-input resize-none" placeholder="Brief description of this category..."></textarea>
            </div>

            <div>
                <label class="form-label">Color</label>
                <div class="flex gap-2 flex-wrap">
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="indigo" class="hidden peer" checked>
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="emerald" class="hidden peer">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-emerald-400 to-cyan-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="sky" class="hidden peer">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-sky-400 to-blue-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="amber" class="hidden peer">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-400 to-orange-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="rose" class="hidden peer">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-rose-400 to-pink-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="color" value="violet" class="hidden peer">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-400 to-purple-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 transition-all"></div>
                    </label>
                </div>
            </div>

            <div class="flex gap-3 pt-4">
                <button type="button" onclick="document.getElementById('addCategoryModal').classList.add('hidden')" class="btn-secondary flex-1">Cancel</button>
                <button type="submit" class="btn-primary flex-1">Create Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
