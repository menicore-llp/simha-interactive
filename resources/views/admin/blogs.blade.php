@extends('layouts.admin')

@section('content')
<div class="px-8 md:px-16 lg:px-24 mx-auto max-w-screen-2xl">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-12">
        <div class="flex flex-col">
           <div class="flex items-center gap-3 w-full mb-3">
              <div class="w-10 h-[2px] bg-brand-orange"></div>
              <span class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium">Dashboard</span>
           </div>
           <h1 class="font-display text-white text-4xl sm:text-5xl leading-none">Manage Blogs</h1>
        </div>
        <div class="mt-6 sm:mt-0">
            <a href="{{ route('admin.blogs.create') }}" class="btn-ghost border border-white text-white px-8 py-3.5 font-body text-sm tracking-widest uppercase inline-flex items-center hover:border-brand-orange transition-colors">
                <span>Create New Blog</span>
                <svg class="ml-2 w-4 h-4 z-10 relative" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="border border-green-500/50 bg-green-500/10 p-4 mb-8 flex gap-3 text-green-400">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="font-body text-sm">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Filters and Search -->
    <form action="{{ route('admin.blogs.index') }}" method="GET" class="border border-brand-border bg-brand-card p-6 mb-8 mt-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="w-full">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest mb-2 block">Search</label>
                <input type="text" name="search" value="{{ request('search') }}"
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors"
                       placeholder="Title, Category, Tags...">
            </div>

            <div class="w-full">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest mb-2 block">Status</label>
                <select name="status" onchange="this.form.submit()"
                        class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors appearance-none">
                    <option value="">All Statuses</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div class="w-full">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest mb-2 block">Category</label>
                <select name="category" onchange="this.form.submit()"
                        class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors appearance-none">
                    <option value="">All Categories</option>
                    <option value="strategy" {{ request('category') == 'strategy' ? 'selected' : '' }}>Strategy</option>
                    <option value="design" {{ request('category') == 'design' ? 'selected' : '' }}>Design</option>
                    <option value="marketing" {{ request('category') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="technology" {{ request('category') == 'technology' ? 'selected' : '' }}>Technology</option>
                </select>
            </div>
            <noscript><button type="submit" class="hidden">Filter</button></noscript>
        </div>
    </form>

    <!-- Table -->
    <div class="border border-brand-border bg-[#0e0e0e] overflow-hidden group hover:border-white transition-colors duration-300">
        <div class="overflow-x-auto">
            <table class="w-full text-left font-body text-sm">
                <thead class="border-b border-brand-border text-xs text-gray-500 tracking-widest uppercase">
                    <tr>
                        <th class="px-6 py-4 font-normal">Image & Title</th>
                        <th class="px-6 py-4 font-normal hidden sm:table-cell">Category</th>
                        <th class="px-6 py-4 font-normal">Status</th>
                        <th class="px-6 py-4 font-normal hidden lg:table-cell">Date</th>
                        <th class="px-6 py-4 font-normal text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-brand-border">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-white/[0.02] transition-colors {{ $blog->status === 'draft' ? 'opacity-75' : '' }}">
                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-12 bg-[#080808] border border-brand-border shrink-0 flex items-center justify-center overflow-hidden">
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" class="w-full h-full object-cover grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all">
                                    @else
                                        <svg class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h3 class="text-white font-medium text-base hover:text-brand-orange transition-colors truncate max-w-[200px] md:max-w-xs">{{ $blog->title }}</h3>
                                    <p class="text-xs text-gray-500 mt-1 max-w-[200px] md:max-w-xs truncate">{{ $blog->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-gray-400 hidden sm:table-cell">{{ $blog->category }}</td>
                        <td class="px-6 py-5">
                            @if($blog->status === 'published')
                                <span class="bg-brand-orange/10 text-brand-orange px-3 py-1 text-xs tracking-wider uppercase border border-brand-orange/20">Published</span>
                            @else
                                <span class="bg-white/5 text-gray-400 px-3 py-1 text-xs tracking-wider uppercase border border-white/10">Draft</span>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-gray-500 hidden lg:table-cell">
                            {{ $blog->publish_date ? \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') : '-' }}
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex items-center justify-end gap-4">
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-gray-400 hover:text-white transition-colors" title="Edit">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Delete this post permanently?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-brand-orange transition-colors" title="Delete">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-gray-500 font-body text-sm">
                            <p class="mb-4">No content exists matching your criteria.</p>
                            <a href="{{ route('admin.blogs.create') }}" class="text-brand-orange hover:text-white border-b border-brand-orange pb-0.5 tracking-wider uppercase text-xs transition">Create Document</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-brand-border bg-[#080808]">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
