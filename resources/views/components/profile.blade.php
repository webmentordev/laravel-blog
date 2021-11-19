@props(['post'=> $post])
<div class="p-2 rounded-lg bg-gray-100 my-2 relative">
    <a href="{{ route('user.profile', $post->user) }}">{{ $post->user->username }}</a>
    <span class="text-gray-500 text-xs absolute top-2 right-2">Posted {{ $post->created_at->diffForHumans() }}</span>
    <p class="text-gray-400 text-sm"><a href="{{ route('post.show', $post) }}">{{ $post->body }}</a></p>
    @if ($post->image != null)
        <img class="m-auto text-center w-4/12" src="{{ asset('images/'.$post->image) }}" alt="">
    @endif

    <div class="mt-3 flex">
        @if (!$post->likedBy(auth()->user()))
            <form action="{{ route('post.like', $post->id) }}" method="post" class="mr-3">
                @csrf
                <button class="text-blue-500" type="submit">Like</button>
            </form>
        @else
            <form action="{{ route('post.destroy', $post->id) }}" method="post" class="mr-3">
                @csrf
                @method('DELETE')
                <button class="text-blue-500" type="submit">Unlike</button>
            </form>
        @endif

        @can('delete', $post)
            <form action="{{ route('post.delete', $post->id) }}" method="post" class="mr-3">
                @csrf
                @method('DELETE')
                <button class="text-blue-500" type="submit">Delete</button>
            </form>
        @endcan
        <p>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</p>
    </div>
</div>
