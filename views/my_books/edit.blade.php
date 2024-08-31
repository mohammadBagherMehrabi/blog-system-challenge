<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Books') }}
        </h2>
    </x-slot>
    <div class="flex justify-center py-10" style="width: 30%; margin: auto">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-200 relative group">
            <form class="space-y-6" action="{{route('my_books.update',$book)}}" method="post" enctype="multipart/form-data">
                @csrf
                <h5 class="text-xl font-bold text-gray-900 dark:text-white">Edit Book</h5>
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Title
                    </label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-gray-200" required
                           @if($book->title)
                               value="{{$book->title}}"
                        @endif
                    >
                    @error('title')
                    <div><p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> {{$message}}.</p></div>
                    @enderror
                </div>
                <div>
                    @if($book->image_url)
                        <div class="relative" x-data="{
                            deleteImage(url){
                                if(confirm('Are you sure?')){
                                    axios.delete(url).then(function(res){
                                        console.log(res)
                                    }).catch(function(err){
                                        console.log(err)
                                })
                                }
                            }
                        }">
                            <img src="{{asset('storage/' . $book->image_url)}}" class="w-30 h-30 group-hover:opacity-75 transition-opacity duration-300" alt="">
                            <button @click="deleteImage(`{{route('my_books.delete_image',$book)}}`)" class="absolute bottom-0 w-full hover:bg-red-800 bg-red-600 text-white mb-2 mt-2 border-gray-300 rounded-md shadow-2xl">Remove</button>
                        </div>
                        <div class="border-t-2 mt-4 pt-4"></div>
                    @endif
                        <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Image(Optional)
                        </label>
                        <input type="file" name="image" id="file_input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-70">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                            PNG, JPEG or Gif.
                        </p>
                        @error('image')
                        <div><p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> {{$message}}.</p></div>
                        @enderror
                    <div class="space-y-2">
                        <label for="message" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Summary
                        </label>
                        <textarea id="message" rows="4" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-50" placeholder="Summary..." name="summary">@if($book->summary){{$book->summary}}@endif
                    </textarea>
                        @error('summary')
                        <div><p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> {{$message}}.</p></div>
                        @enderror
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-100">Edit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
