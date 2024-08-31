<x-app-layout>
    <div class="py-12" x-data="{
    isAlreadyLiked: `{{$isAlreadyLiked}}`,
    isAuth: `{{auth()->check()}}`,
    like(url){
        if(!this.isAuth){
            alert('you should login first!')
        }
        else{
            axios.post(url).then(function(res){
                console.log(res);
                location.reload()
            }).catch(function(err){
                console.log(err);
            });
        }
    },
    submitForm() {
        if (this.isAuth) {
            // User is authenticated, submit the form
            document.querySelector('#comment-form').submit();
        } else {
            // User is not authenticated, show an alert
            alert('You should log in first!');
        }
    }

}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col justify-center items-center">
                    <div>
                        <img class="h-auto max-w-sm rounded-lg shadow-none transition-shadow duration-300 ease-in-out hover:shadow-lg hover:shadow-black/30" src="{{asset('storage/'.$book->image_url)}}">
                    </div>
                    <div class="mt-3 capitalize font-bold">
                        <h1>
                            {{$book->title}}
                        </h1>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
                    <div class="text-center w-3/4 mb-5">
                        <p><span>{{$book->summary}}</span></p>
                    </div>
                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">

                    <div class="text-blue-800 mb-2">
                        <p class="text-sm tracking-tight dark:text-white mb-2">
                            Created By: <b>{{$book->user->name}}</b>, at {{$book->created_at->diffForHumans()}}</p>
                    </div>
                    <div>
                        <svg @click="like(`{{route('book.toggle-like',$book)}}`)" class="cursor-pointer w-8 h-8 text-red-600"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" :fill="isAlreadyLiked ? 'currentColor' : 'none'" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z"/>
                        </svg>

                    </div>
                    <div class="text-xs">
                        <p>{{$likesCount}} likes</p>
                    </div>


                <div class="bg-white p-4 w-3/4 mt-8">
                    <h1 class="text-3xl mb-6">Discussion {{$commentsCount}}</h1>
                    <div class="mb-6">
                        <form action="{{route('comment.store',$book)}}" method="post" id="comment-form">
                            @csrf
                            <textarea name="comment_body" class="w-full h-32 rounded-t-lg bg-gray-50 border-gray-300 mb-0" placeholder="Leave a comment..." required></textarea>
                            <button @click.prevent="submitForm()" type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post Comment</button>
                        </form>
                    </div>
                    <div class="mt-8">
                        @foreach($comments as $comment)
                            @include('partial/commentBox',['comment'=>$comment])
                        @endforeach
                    </div>


                </div>






                </div>
            </div>
        </div>
    </div>
</x-app-layout>
