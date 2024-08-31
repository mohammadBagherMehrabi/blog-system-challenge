<x-app-layout>
    <x-slot name="header">

    </x-slot>
<div class="p-12">

    <div class="flex">
        <a href="{{route('my_books.create')}}" class="hover:cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
    </div>
    @if($books->count()>0)
    <table class="w-full text-sm text-left rtl:text-right text-gray-500" x-data="{
                deleteBook(url){
                    if(confirm('Are you sure?')){
                        axios.delete(url).then(function(res){
                            if (res.status==204){
                                location.reload();
                            }
                        }).catch(function(err){
                            console.log(err)
                        })
                    }

                }
            }">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    title
                </th>
                <th scope="col" class="px-6 py-3">
                    created at
                </th>
                <th scope="col" class="px-6 py-3">
                    actions
                </th>

            </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap flex space-x-3">
                    @if($book->image_url)
                    <img src="{{asset('storage/' . $book->image_url)}}" class="w-10 h-10" alt="">
                    @endif
                    <h1 class="my-2 text-center font-semibold">
                        <a href="#" class="font-medium hover:underline text-blue-600">
                            {{$book->title}}
                        </a>
                    </h1>
                </th>

            <td class="px-6 py-4">
                {{$book->created_at->diffForHumans()}}
            </td>
            <td class="px-6 py-4 space-x-2">
                <a href="{{route('my_books.edit',['book'=>$book])}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                <button @click="deleteBook(`{{route('my_books.delete',$book)}}`)" class="font-medium text-red-600 hover:underline">Remove</button>
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="flex justify-center text-3xl text-gray-500">
            <h1>There is no Book available :(</h1>
        </div>
    @endif
    <div class="flex justify-center pb-10">
        {{$books->links()}}
    </div>
</div>
</x-app-layout>
