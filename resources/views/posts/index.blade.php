@php use App\Models\Post;
@endphp
<x-layout>
    @include('components.layout._header')

    <main class="px-16 py-12 flex flex-col gap-12">
          @foreach(Post::all() as $post)
              <x-postCard :id="$post->id" :languageCode="$post->languageCode" :title="$post->title" :description="$post->content" :tag="$post->category" :user="$post->user->username" :date="$post->created_at->diffForHumans()" :comments="$post->comments->count()" :votes="$post->postVotes" />
        @endforeach
    </main>

    <x-layout._footer/>
</x-layout>
