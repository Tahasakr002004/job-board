<x-layout :title='$tabTitle' :pageTitle='$pageTitle'>
    <form method="POST" action="/blog">
        @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create New Post</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Use this form to publish new post into out blog.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="tilte" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
                   
             <input 
                value="{{ old('title') }}"
                id="title" 
                type="text" 
                name="title" 
                class="block w-full rounded-md border px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm
              {{ $errors->has('title') ? 'border-red-500' : 'border-gray-300' }}"
            />

                

            </div>
              @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
        </div>

            <div class="sm:col-span-3">
               <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
               <div class="mt-2">
                 <input 
                    value="{{ old('author') }}"
                   id="author" type="text" name="author"
                    class="block w-full rounded-md border px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm
              {{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }}"
                />
               </div>
                @error('author')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-full">
              <label for="body" class="block text-sm/6 font-medium text-gray-900">body</label>
               <div class="mt-2">
                <textarea  
                 id="body" name="body" rows="3"
                   class="block w-full rounded-md border px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm
              {{ $errors->has('body') ? 'border-red-500' : 'border-gray-300' }}">{{ old('body') }}
                </textarea>
               </div>
               <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
               @error('body')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-full">
                <div class="flex gap-3">
                        <div class="flex h-6 shrink-0 items-center">
                            <div class="grid size-4 grid-cols-1">
                            <!-- Checkbox is now a peer -->
                            <input 
                                id="published" 
                                type="checkbox" 
                                name="published" 
                                aria-describedby="published-description" 
                                class="peer col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white 
                                    checked:border-indigo-600 checked:bg-indigo-600 focus-visible:outline-2 
                                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 
                                    disabled:bg-gray-100 disabled:checked:bg-gray-100"
                            />

                            <!-- Checkmark (shown only when peer is checked) -->
                            <svg viewBox="0 0 14 14" fill="none" 
                                class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center 
                                        stroke-white opacity-0 peer-checked:opacity-100">
                                <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            </div>
                        </div>

                        <div class="text-sm/6">
                            <label for="published" class="font-medium text-gray-900"> publish ?</label>
                            <p id="published-description" class="text-gray-500">Do you want to publish it or save it as draft?</p>
                        </div>
                        
                </div>
                @error('published')
                     <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>  
      </div>
    </div>
  </div>

   <div class="mt-6 flex items-center justify-end gap-x-6">
     <a href="/blog" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
     <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
   </div>
</form>

</x-layout>
