@props(['id', 'title', 'description', 'user', 'date', 'tag', 'comments', 'votes', 'languageCode' ])
@php use Illuminate\Support\Carbon;
 $totalVote = 0;
 foreach($votes as $vote) {
    $totalVote += $vote->value;
}
@endphp
<a href="{{ route('post.show', $id) }}">
    <article class="bg-background-surface flex p-6 gap-6 rounded-lg border border-border">
        <div>
            <div class="flex flex-col w-8 h-14 justify-center items-center bg-background-secondary p-2 border border-border text-accent-content rounded-sm">
                <button class="cursor-pointer text-muted-foreground p-0.5">
                    <x-icons.like_icon />
                </button>

                <span class="text-[11px] font-bold leading-5 font-display text-white">{{ max(0, $totalVote) }}</span>

                <button class="cursor-pointer text-muted-foreground p-0.5">
                    <x-icons.dislike_icon />
                </button>
            </div>
        </div>

        <section class="w-full">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <p class="px-2 py-1 text-[11px] border border-border-foreground rounded-sm">{{ $tag }}</p>
                </div>

                <div class="flex items-center gap-2">
                    <p class="font-semibold text-xs text-border-foreground">{{ $user }}</p>

                    <p class="text-xs text-muted-foreground">• {{ $date }}</p>
                </div>
            </div>

            <h3 class="mt-2 font-display text-white font-bold text-[20px]">{{ $title }}</h3>

            <p class="mt-2 pt-2 text-muted-foreground text-sm">
              {{ $description }}
            </p>

            <div class="border border-border px-4 pt-4 rounded-lg bg-snippet mt-4">
                <div class="flex items-center justify-between text-[11px] pb-2 border-b border-b-border text-muted-foreground font-mono">
                    {{ $languageCode }}

                    <button class="flex items-center gap-1.5 text-[11px] text-muted-foreground font-mono">
                        <x-icons.copy_icon />
                        Copy
                    </button>
                </div>
                <pre class="m-0 w-full max-h-22.5 overflow-auto"><code class="text-[13px]">function test () {
  console.log('test')
}</code></pre>
            </div>

            <div class="flex justify-end mt-4 ">
                <div class="flex items-center gap-2 text-[13px] text-foreground">
                    <x-icons.comment_icon />
                    {{ $comments }} {{ $comments > 1 ? 'comments' : 'comment'}}
                </div>
            </div>
        </section>
    </article>
</a>
