@extends('layouts.admin')

@section('title', 'Categories')

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

    <!-- Page Header -->
    <!-- <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
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
    </div> -->

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
        @forelse($categories as $category)
        <div class="glass-card p-6 {{ $category->hover_border_class }} transition-all group">
            <div class="flex items-start justify-between">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br {{ $category->gradient_classes }} flex items-center justify-center shadow-lg {{ $category->shadow_class }}">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category->icon_path }}"/>
                    </svg>
                </div>
                <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button onclick="openEditModal({{ $category->id }}, {{ json_encode($category->name) }}, {{ json_encode($category->description ?? '') }}, {{ json_encode($category->color) }}, {{ json_encode($category->icon) }})" class="p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </button>
                    <button onclick="openDeleteModal({{ $category->id }}, '{{ addslashes($category->name) }}')" class="p-2 rounded-lg hover:bg-rose-500/20 text-slate-400 hover:text-rose-400 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-white mt-4">{{ $category->name }}</h3>
            <p class="text-sm text-slate-400 mt-1">{{ $category->description ?: 'No description' }}</p>
            <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-700/50">
                <span class="text-sm text-slate-400">0 expenses</span>
                <span class="text-sm font-semibold text-white">$0.00</span>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="sm:col-span-2 lg:col-span-3 xl:col-span-4">
            <div class="glass-card p-12 text-center">
                <div class="w-20 h-20 rounded-2xl bg-slate-700/50 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-white mb-2">No categories yet</h3>
                <p class="text-slate-400 mb-6">Create your first category to start organizing your expenses</p>
                <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" class="btn-primary inline-flex">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create First Category
                </button>
            </div>
        </div>
        @endforelse

        @if($categories->count() > 0)
        <!-- Add New Category Card -->
        <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" class="glass-card p-6 border-dashed border-2 hover:border-indigo-500/50 transition-all flex flex-col items-center justify-center min-h-[200px] group">
            <div class="w-14 h-14 rounded-xl bg-slate-700/50 group-hover:bg-indigo-500/20 flex items-center justify-center transition-colors">
                <svg class="w-7 h-7 text-slate-400 group-hover:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </div>
            <p class="text-slate-400 group-hover:text-white mt-4 font-medium transition-colors">Add New Category</p>
        </button>
        @endif
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-lg p-0 animate-fade-in-up overflow-hidden">
        <!-- Modal Header with Gradient -->
        <div class="relative px-6 pt-6 pb-4 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 border-b border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Create New Category</h3>
                    <p class="text-sm text-slate-400">Organize your expenses better</p>
                </div>
            </div>
            <button onclick="document.getElementById('addCategoryModal').classList.add('hidden')" class="absolute top-4 right-4 p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6 space-y-5">
            @csrf
            
            <!-- Live Preview Card -->
            <div class="p-4 rounded-xl bg-slate-800/50 border border-slate-700/50">
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-3">Preview</p>
                <div class="flex items-center gap-4">
                    <div id="previewIcon" class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/25 transition-all">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 id="previewName" class="text-lg font-semibold text-white">Category Name</h4>
                        <p id="previewDesc" class="text-sm text-slate-400">Description will appear here</p>
                    </div>
                </div>
            </div>

            <!-- Name Field - Eye Catching -->
            <div class="relative group">
                <label for="name" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 shadow-lg shadow-indigo-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Category Name
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <!-- Gradient Border Wrapper -->
                <div class="relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl opacity-0 group-hover:opacity-75 group-focus-within:opacity-100 blur transition-all duration-300"></div>
                    <div class="relative flex items-center">
                        <div class="absolute left-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-slate-400 group-focus-within:text-indigo-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" 
                            class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:bg-slate-800/90 transition-all duration-300" 
                            placeholder="Enter category name..." 
                            required 
                            oninput="updatePreview()">
                    </div>
                </div>
                <p class="mt-2 text-xs text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Choose a unique, descriptive name for your category
                </p>
            </div>
            
            <!-- Description Field - Similar Design, Subtle Hover -->
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
                    <textarea id="description" name="description" rows="3" 
                        class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-slate-500 focus:bg-slate-800/90 hover:border-slate-500/70 transition-all duration-300 resize-none" 
                        placeholder="Add a brief description..." 
                        oninput="updatePreview()"></textarea>
                </div>
                <p class="mt-2 text-xs text-slate-500 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Describe what expenses belong in this category
                </p>
            </div>

            <!-- Color Selection -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-3">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                        Theme Color
                    </span>
                </label>
                <div class="grid grid-cols-6 gap-3">
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="indigo" class="hidden peer" checked onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-indigo-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Indigo</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="emerald" class="hidden peer" onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-emerald-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Emerald</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="sky" class="hidden peer" onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-sky-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Sky</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="amber" class="hidden peer" onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-amber-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Amber</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="rose" class="hidden peer" onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-pink-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-rose-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Rose</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="violet" class="hidden peer" onchange="updatePreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-400 to-purple-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-violet-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Violet</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Icon Selection -->
            <div>
                <label class="block text-sm font-medium text-slate-300 mb-3">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Icon
                    </span>
                </label>
                <div class="grid grid-cols-7 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="tag" class="hidden peer" checked onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Tag">
                            <svg class="w-5 h-5 text-slate-400 peer-checked:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="computer" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Computer">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="location" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Location">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="code" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Code">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="cart" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Shopping">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="briefcase" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Briefcase">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="bolt" class="hidden peer" onchange="updatePreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-indigo-500/20 peer-checked:ring-2 peer-checked:ring-indigo-500 flex items-center justify-center transition-all" title="Lightning">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-4 border-t border-slate-700/50">
                <button type="button" onclick="document.getElementById('addCategoryModal').classList.add('hidden')" class="flex-1 px-4 py-3 bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-sm font-medium rounded-xl transition-all">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Category
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-lg p-0 animate-fade-in-up overflow-hidden">
        <!-- Modal Header with Gradient -->
        <div class="relative px-6 pt-6 pb-4 bg-gradient-to-r from-amber-500/10 to-orange-500/10 border-b border-slate-700/50">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-amber-500 to-orange-600 flex items-center justify-center shadow-lg shadow-amber-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-white">Edit Category</h3>
                    <p class="text-sm text-slate-400">Update category details</p>
                </div>
            </div>
            <button onclick="document.getElementById('editCategoryModal').classList.add('hidden')" class="absolute top-4 right-4 p-2 rounded-lg hover:bg-slate-700/50 text-slate-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        
        <form id="editCategoryForm" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')
            
            <!-- Live Preview Card -->
            <div class="p-4 rounded-xl bg-slate-800/50 border border-slate-700/50">
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider mb-3">Preview</p>
                <div class="flex items-center gap-4">
                    <div id="editPreviewIcon" class="w-14 h-14 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center shadow-lg shadow-indigo-500/25 transition-all">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 id="editPreviewName" class="text-lg font-semibold text-white">Category Name</h4>
                        <p id="editPreviewDesc" class="text-sm text-slate-400">Description will appear here</p>
                    </div>
                </div>
            </div>

            <!-- Name Field - Eye Catching -->
            <div class="relative group">
                <label for="edit_name" class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-amber-500 to-orange-600 shadow-lg shadow-amber-500/30">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </span>
                        Category Name
                        <span class="inline-flex items-center justify-center w-5 h-5 text-[10px] font-bold bg-rose-500/20 text-rose-400 rounded-full border border-rose-500/30">*</span>
                    </span>
                </label>
                <div class="relative">
                    <div class="absolute left-4 top-1/2 -translate-y-1/2 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400 group-focus-within:text-amber-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <input type="text" id="edit_name" name="name" 
                        class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white text-lg font-medium placeholder-slate-500 focus:outline-none focus:border-amber-500 focus:bg-slate-800/90 hover:border-slate-500/70 transition-all duration-300" 
                        placeholder="Enter category name..." 
                        required 
                        oninput="updateEditPreview()">
                </div>
            </div>
            
            <!-- Description Field -->
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
                    <textarea id="edit_description" name="description" rows="3" 
                        class="w-full pl-12 pr-4 py-4 bg-slate-800 border-2 border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-slate-500 focus:bg-slate-800/90 hover:border-slate-500/70 transition-all duration-300 resize-none" 
                        placeholder="Add a brief description..." 
                        oninput="updateEditPreview()"></textarea>
                </div>
            </div>

            <!-- Color Selection -->
            <div>
                <label class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-slate-600 to-slate-700 shadow-lg">
                            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                        </span>
                        Theme Color
                    </span>
                </label>
                <div class="grid grid-cols-6 gap-3" id="edit_color_options">
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="indigo" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-indigo-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Indigo</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="emerald" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-cyan-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-emerald-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Emerald</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="sky" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 to-blue-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-sky-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Sky</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="amber" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-amber-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Amber</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="rose" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-pink-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-rose-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Rose</span>
                        </div>
                    </label>
                    <label class="cursor-pointer group">
                        <input type="radio" name="color" value="violet" class="hidden peer" onchange="updateEditPreview()">
                        <div class="flex flex-col items-center gap-1.5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-400 to-purple-500 peer-checked:ring-2 peer-checked:ring-white peer-checked:ring-offset-2 peer-checked:ring-offset-slate-800 group-hover:scale-110 transition-all shadow-lg shadow-violet-500/20"></div>
                            <span class="text-[10px] text-slate-500 group-hover:text-slate-300 transition-colors">Violet</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Icon Selection -->
            <div>
                <label class="block text-sm font-semibold text-slate-200 mb-3">
                    <span class="flex items-center gap-2">
                        <span class="flex items-center justify-center w-6 h-6 rounded-lg bg-gradient-to-br from-slate-600 to-slate-700 shadow-lg">
                            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        Icon
                    </span>
                </label>
                <div class="grid grid-cols-7 gap-2" id="edit_icon_options">
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="tag" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Tag">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="computer" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Computer">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="location" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Location">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="code" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Code">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="cart" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Shopping">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="briefcase" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Briefcase">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="icon" value="bolt" class="hidden peer" onchange="updateEditPreview()">
                        <div class="w-10 h-10 rounded-lg bg-slate-700/50 hover:bg-slate-600/50 peer-checked:bg-amber-500/20 peer-checked:ring-2 peer-checked:ring-amber-500 flex items-center justify-center transition-all" title="Lightning">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 pt-4 border-t border-slate-700/50">
                <button type="button" onclick="document.getElementById('editCategoryModal').classList.add('hidden')" class="flex-1 px-4 py-3 bg-slate-700/50 hover:bg-slate-600/50 text-slate-300 text-sm font-medium rounded-xl transition-all">
                    Cancel
                </button>
                <button type="submit" class="flex-1 px-4 py-3 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white text-sm font-semibold rounded-xl shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteCategoryModal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm"></div>
    <div class="relative glass-card w-full max-w-sm p-6 animate-fade-in-up">
        <div class="text-center">
            <div class="w-16 h-16 rounded-2xl bg-rose-500/20 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-white mb-2">Delete Category</h3>
            <p class="text-slate-400 mb-6">Are you sure you want to delete <span id="deleteCategoryName" class="text-white font-medium"></span>? This action cannot be undone.</p>
            
            <form id="deleteCategoryForm" method="POST" class="flex gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="document.getElementById('deleteCategoryModal').classList.add('hidden')" class="btn-secondary flex-1">Cancel</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-rose-500 hover:bg-rose-600 text-white text-sm font-medium rounded-xl shadow-lg shadow-rose-500/25 transition-all hover:shadow-rose-500/40">Delete</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
const colorGradients = {
    indigo: 'from-indigo-500 to-purple-600',
    emerald: 'from-emerald-400 to-cyan-500',
    sky: 'from-sky-400 to-blue-500',
    amber: 'from-amber-400 to-orange-500',
    rose: 'from-rose-400 to-pink-500',
    violet: 'from-violet-400 to-purple-500'
};

const colorShadows = {
    indigo: 'shadow-indigo-500/25',
    emerald: 'shadow-emerald-500/25',
    sky: 'shadow-sky-500/25',
    amber: 'shadow-amber-500/25',
    rose: 'shadow-rose-500/25',
    violet: 'shadow-violet-500/25'
};

const iconPaths = {
    tag: 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
    computer: 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
    location: 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
    code: 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
    cart: 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
    briefcase: 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
    bolt: 'M13 10V3L4 14h7v7l9-11h-7z'
};

function updatePreview() {
    const name = document.getElementById('name').value || 'Category Name';
    const description = document.getElementById('description').value || 'Description will appear here';
    const color = document.querySelector('input[name="color"]:checked')?.value || 'indigo';
    const icon = document.querySelector('input[name="icon"]:checked')?.value || 'tag';
    
    // Update preview text
    document.getElementById('previewName').textContent = name;
    document.getElementById('previewDesc').textContent = description;
    
    // Update preview icon container
    const previewIcon = document.getElementById('previewIcon');
    previewIcon.className = `w-14 h-14 rounded-xl bg-gradient-to-br ${colorGradients[color]} flex items-center justify-center shadow-lg ${colorShadows[color]} transition-all`;
    
    // Update icon SVG
    const svgPath = previewIcon.querySelector('path');
    if (svgPath) {
        svgPath.setAttribute('d', iconPaths[icon]);
    }
}

function updateEditPreview() {
    const name = document.getElementById('edit_name').value || 'Category Name';
    const description = document.getElementById('edit_description').value || 'Description will appear here';
    const color = document.querySelector('#edit_color_options input[name="color"]:checked')?.value || 'indigo';
    const icon = document.querySelector('#edit_icon_options input[name="icon"]:checked')?.value || 'tag';
    
    // Update preview text
    document.getElementById('editPreviewName').textContent = name;
    document.getElementById('editPreviewDesc').textContent = description;
    
    // Update preview icon container
    const previewIcon = document.getElementById('editPreviewIcon');
    previewIcon.className = `w-14 h-14 rounded-xl bg-gradient-to-br ${colorGradients[color]} flex items-center justify-center shadow-lg ${colorShadows[color]} transition-all`;
    
    // Update icon SVG
    const svgPath = previewIcon.querySelector('path');
    if (svgPath) {
        svgPath.setAttribute('d', iconPaths[icon]);
    }
}

function openEditModal(id, name, description, color, icon) {
    document.getElementById('editCategoryForm').action = '{{ url("admin/categories") }}/' + id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_description').value = description || '';
    
    // Set the color radio
    const colorInputs = document.querySelectorAll('#edit_color_options input[name="color"]');
    colorInputs.forEach(input => {
        input.checked = input.value === color;
    });
    
    // Set the icon radio
    const iconInputs = document.querySelectorAll('#edit_icon_options input[name="icon"]');
    iconInputs.forEach(input => {
        input.checked = input.value === icon;
    });
    
    // Update the preview with current values
    updateEditPreview();
    
    document.getElementById('editCategoryModal').classList.remove('hidden');
}

function openDeleteModal(id, name) {
    document.getElementById('deleteCategoryForm').action = '{{ url("admin/categories") }}/' + id;
    document.getElementById('deleteCategoryName').textContent = name;
    document.getElementById('deleteCategoryModal').classList.remove('hidden');
}
</script>
@endpush
@endsection
