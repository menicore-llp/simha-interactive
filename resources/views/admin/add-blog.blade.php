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
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>3D Architectural Interior Rendering</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>3D Architectural Exterior Rendering</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>3D Floor Plans</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>Walkthrough Animations</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>Real Estate Marketing Visuals</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>3D Product Animation</option>
                    <option value="Visualization" {{ old('category', $blog->category ?? '') == 'Visualization' ? 'selected' : '' }}>3D Product Rendering</option>
                    <option value="Design" {{ old('category', $blog->category ?? '') == 'Design' ? 'selected' : '' }}>Website Design and Development</option>
                    <option value="Engagement" {{ old('category', $blog->category ?? '') == 'Engagement' ? 'selected' : '' }}>AR & VR Experiences</option>
                    <option value="Engagement" {{ old('category', $blog->category ?? '') == 'Engagement' ? 'selected' : '' }}>Interactive & Display Solutions</option>
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
            
            <!-- Editor Container -->
            <div id="editor-container" class="w-full bg-transparent text-white font-body text-sm focus:outline-none" style="min-height: 350px;">{!! old('content', $blog->content ?? '') !!}</div>
            
            <!-- Hidden input to hold quill data for form submission -->
            <input type="hidden" name="content" id="hidden-content" value="{{ old('content', $blog->content ?? '') }}">
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

<!-- Rich Text Editor (Quill.js) -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    /* Quill Dark Theme Overrides */
    .ql-toolbar.ql-snow {
        border: none;
        border-bottom: 1px solid #1f1f1f;
        background-color: transparent;
        padding: 12px 16px;
    }
    .ql-container.ql-snow {
        border: none;
    }
    .ql-editor {
        min-height: 350px;
        color: #ffffff;
        font-family: 'Outfit', sans-serif;
        font-size: 1rem;
        padding: 16px;
    }
    /* Ensure content renders nicely inside editor */
    .ql-editor h1 { font-size: 2em; font-weight: bold; margin-bottom: 0.5em; color: #ffffff; }
    .ql-editor h2 { font-size: 1.5em; font-weight: bold; margin-bottom: 0.5em; color: #ffffff; }
    .ql-editor a { color: #FF5C1A; text-decoration: underline; }
    
    /* Toolbar Icons colors overrides to match dark theme */
    .ql-snow .ql-stroke { stroke: #cccccc; }
    .ql-snow .ql-fill { fill: #cccccc; }
    .ql-snow .ql-picker { color: #cccccc; }
    
    .ql-snow.ql-toolbar button:hover .ql-stroke, 
    .ql-snow .ql-toolbar button:hover .ql-stroke, 
    .ql-snow.ql-toolbar button.ql-active .ql-stroke, 
    .ql-snow .ql-toolbar button.ql-active .ql-stroke {
        stroke: #FF5C1A;
    }
    .ql-snow.ql-toolbar button:hover .ql-fill, 
    .ql-snow .ql-toolbar button:hover .ql-fill, 
    .ql-snow.ql-toolbar button.ql-active .ql-fill, 
    .ql-snow .ql-toolbar button.ql-active .ql-fill {
        fill: #FF5C1A;
    }
    
    /* Make toolbar dividers subtle */
    .ql-toolbar.ql-snow .ql-formats {
        margin-right: 20px;
        border-right: 1px solid #333;
        padding-right: 20px;
    }
    .ql-toolbar.ql-snow .ql-formats:last-child {
        border-right: none;
    }
</style>
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'bullet' }],
                ['link', 'image']
            ]
        },
        theme: 'snow' // snow is the clean, minimalist theme (mimicking the image)
    });

    var hiddenInput = document.querySelector('#hidden-content');
    
    // Sync the Quill content to the hidden input immediately on any change
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });

    // Populate hidden input on form submit (double safety)
    var form = document.querySelector('form');
    form.addEventListener('submit', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
</script>
@endsection
