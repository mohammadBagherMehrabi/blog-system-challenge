@php use Illuminate\Support\Str; @endphp
<x-app-layout>
    <x-slot name="header">

        <form action="{{route('book.search')}}" class="max-w-md mx-auto" method="get">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input value="{{request()->query('search_item') ?? null}}" name="search_item" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Books,Authors..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

    </x-slot>
    <div class="py-12 flex justify-evenly flex-wrap">

        @foreach($books as $book)
            <div style="min-height: 400px;"
                class="w-80 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-8">
                <a href="#">
                    <img class="rounded-t-lg w-full h-56 object-cover" src="{{asset('storage/'.$book->image_url)}}"
                         alt=""/>
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize">{{$book->title}}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 min-h-14">{{Str::limit($book->summary,65,"...")}}</p>
                    <h6 class="mb-2 text-1xl font-bold tracking-tight text-green-400 dark:text-white"><span
                            class="text-black">Created By: </span>{{$book->user->name}}</h6>
                    <a href="{{route('book.show',$book)}}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-center">{{$books->links()}}</div>
</x-app-layout>
