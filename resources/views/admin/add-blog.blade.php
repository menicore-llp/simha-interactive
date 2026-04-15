@extends('layouts.admin')

@section('content')
<div class="px-8 md:px-16 lg:px-24 mx-auto max-w-4xl">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
        <div class="flex flex-col">
           <div class="flex items-center gap-3 w-full mb-3">
              <div class="w-10 h-[2px] bg-brand-orange"></div>
              <a href="{{ route('admin.blogs.index') }}" class="font-body text-xs text-brand-orange tracking-[0.4em] uppercase font-medium hover:text-white transition">Back to Blogs</a>
           </div>
           <h1 class="font-display text-white text-4xl sm:text-5xl leading-none">
              {{ isset($blog) ? 'Edit Document' : 'Create Context' }}
           </h1>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="border border-red-500/50 bg-red-500/10 p-5 mb-8 text-red-400 font-body text-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($blog))
            @method('PUT')
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Title <span class="text-brand-orange">*</span></label>
                <input type="text" name="title" value="{{ old('title', $blog->title ?? '') }}" required
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors">
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Slug <span class="text-gray-700">(auto-generates if empty)</span></label>
                <input type="text" name="slug" value="{{ old('slug', $blog->slug ?? '') }}"
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors">
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Category <span class="text-brand-orange">*</span></label>
                <select name="category" required class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors appearance-none">
                    <option value="" disabled {{ old('category', $blog->category ?? '') == '' ? 'selected' : '' }}>Select Category</option>
                    <option value="strategy" {{ old('category', $blog->category ?? '') == 'strategy' ? 'selected' : '' }}>Strategy</option>
                    <option value="design" {{ old('category', $blog->category ?? '') == 'design' ? 'selected' : '' }}>Design</option>
                    <option value="marketing" {{ old('category', $blog->category ?? '') == 'marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="technology" {{ old('category', $blog->category ?? '') == 'technology' ? 'selected' : '' }}>Technology</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Status <span class="text-brand-orange">*</span></label>
                <select name="status" required class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors appearance-none">
                    <option value="published" {{ old('status', $blog->status ?? 'published') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status', $blog->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Publish Date</label>
                <input type="date" name="publish_date" value="{{ old('publish_date', $blog->publish_date ?? '') }}"
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors appearance-none">
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Author</label>
                <input type="text" name="author" value="{{ old('author', $blog->author ?? 'Admin') }}" required
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors">
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Tags (comma separated)</label>
                <input type="text" name="tags" value="{{ old('tags', $blog->tags ?? '') }}"
                       class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors">
            </div>

            <div class="space-y-2">
                <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Cover Image</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full text-white font-body text-sm file:mr-4 file:py-3 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-white/10 file:text-white hover:file:bg-white/20 hover:file:cursor-pointer transition-colors border border-brand-border border-dashed p-1">
                @if(isset($blog) && $blog->image)
                    <div class="mt-4 border border-brand-border p-2 inline-block bg-[#0e0e0e]">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Preview" class="h-24 w-auto object-cover grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition">
                        <p class="text-xs text-gray-500 mt-2 font-body tracking-wider uppercase">Current Image</p>
                    </div>
                @endif
            </div>
            
        </div>

        <div class="space-y-2">
            <label class="font-body text-xs text-gray-500 uppercase tracking-widest block">Short Description</label>
            <textarea name="short_description" rows="2" maxlength="255" required
                      class="w-full bg-[#080808] border border-brand-border text-white px-4 py-3 font-body text-sm focus:outline-none focus:border-brand-orange transition-colors">{{ old('short_description', $blog->short_description ?? '') }}</textarea>
        </div>

        <div class="space-y-2 border border-brand-border bg-[#0e0e0e] p-1 pb-0">
            <label class="font-body text-xs text-brand-orange uppercase tracking-widest block px-4 pt-3 pb-2 border-b border-brand-border">Content Editor</label>
            <textarea name="content" rows="12"
                      class="w-full bg-transparent text-white px-4 py-4 font-body text-sm focus:outline-none">{{ old('content', $blog->content ?? '') }}</textarea>
        </div>

        <div class="pt-6 border-t border-brand-border flex items-center justify-end gap-4">
            <a href="{{ route('admin.blogs.index') }}" class="font-body text-sm text-gray-400 hover:text-white tracking-widest uppercase transition">Cancel</a>
            <button type="submit" class="btn-ghost border border-white text-white px-10 py-4 font-body text-sm tracking-widest uppercase inline-flex items-center hover:border-brand-orange transition-colors">
                <span>{{ isset($blog) ? 'Update Document' : 'Publish Document' }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3 w-4 h-4 z-10 relative" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </button>
        </div>

    </form>
</div>
@endsection
