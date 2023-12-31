<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 style="margin: 10px 40px" class="text-lg font-bold mb-4">
            Publish New Post
        </h1>
        <x-panel class="max-w-sm mx-auto">
   <form action="/admin/posts" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-6">
      <label  class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
         Title
      </label>
      <input class="border border-gray-400 p-2 w-full"
             type="text"
             name="title"
             id="title"
             value='{{ old('title')}}'
             required>

        @error('title')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror


        <label style="margin-top: 10px" class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                Slug
        </label>
            <input class="border border-gray-400 p-2 w-full"
                   type="text"
                   name="slug"
                   id="slug"
                   value='{{ old('slug')}}'
                   required>

            @error('slug')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror

        <label style="margin-top: 10px" class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
            Excerpt
         </label>
         <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="excerpt"
                id="excerpt"
                value='{{ old('excerpt')}}'
                required>

           @error('excerpt')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
           @enderror
   
        
           <label style="margin-top: 10px" class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
            Thumbnail
         </label>
         <input class="border border-gray-400 p-2 w-full"
                type="file"
                name="thumbnail"
                id="thumbnail"
                required>

           @error('thumbnail')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
           @enderror


           <label style="margin-top: 10px" class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
            Body
         </label>
         <input class="border border-gray-400 p-2 w-full"
                type="text"
                name="body"
                id="body"
                value='{{ old('body')}}'
                required>

           @error('body')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
           @enderror

           <div class="mb-6">
           <label style="margin-top:20px" class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
            Category
         </label>
         <select style="border: 2px solid gray" name="category_id" id="category_id">
            @php
                  $categories = App\Models\Category::all();
            @endphp

           @foreach ($categories as $category)
           <option  value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
           @endforeach
         </select>

         @error('category')
           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
         @enderror
           </div>
           <x-submit-button>
            Publish
           </x-submit-button>
    </div>

   </form>
</x-panel>
    </section>

</x-layout>
