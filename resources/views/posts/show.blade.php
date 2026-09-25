@php
$totalVotes = 0;
    foreach($post->postVotes as $postVote) {
        $totalVotes += $postVote->value;
    }
@endphp

<x-layout>
    <x-layout._header/>


    <main class="flex py-8 justify-center min-h-screen">
        <div class="flex flex-col gap-6">
            <div>
                <a href="{{ route('posts.index') }}" class="inline-flex items-center text-muted-foreground font-semibold text-sm gap-2">
                    <x-icons.back-arrow_icon/>
                    Back to Feed
                </a>
            </div>

            <article class="flex border border-border rounded-xl bg-background-secondary w-4xl">
                <div class="flex flex-col items-center text-muted-foreground gap-1 py-5 min-w-14">
                    <button type="button" class="cursor-pointer">
                        <x-icons.upvote_icon/>
                    </button>
                    <span class="font-display text-xs font-bold text-neutral-content">{{ max(0, $totalVotes) }}</span>
                    <button type="button" class="cursor-pointer">
                        <x-icons.downvote_icon/>
                    </button>
                </div>

                <section class="p-8 border-l border-l-border flex flex-col gap-4">
                    <header class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-full uppercase font-bold text-sm bg-primary/80 flex items-center justify-center text-black">
                                {{ substr($post->user->username, 0, 2) }}
                            </div>

                            <div class="flex flex-col">
                                <span class="text-neutral-content font-display font-bold text-[16px]"> {{ $post->user->username }}</span>
                                <span class="text-muted-foreground text-sm"> Posted {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <p class="px-2.5 py-1 text-primary border border-border rounded-md text-xs font-display font-semibold">{{ $post->category }}</p>
                    </header>

                    <h1 class="font-display font-bold text-neutral-content text-[32px] leading-10 tracking-[-0.08rem]">{{ $post->title }}</h1>

                    <p class="text-[16px] leading-6.5">{{ $post->content}}</p>

                    <div class="bg-snippet rounded-xl pt-2 border border-border">
                        <header class="px-4 py-2.5 flex items-center justify-between border-b border-b-border">
                            <div class="flex items-center">
                                <div class="flex items-center gap-2">
                                    <span class="inline-block size-3 rounded-full bg-macos-close/80"></span>
                                    <span class="inline-block size-3 rounded-full bg-macos-minimize/80"></span>
                                    <span class="inline-block size-3 rounded-full bg-macos-zoom/80"></span>
                                </div>
                                <span></span>
                            </div>

                            <button type="button" class="flex items-center bg-background-secondary rounded-sm border border-border text-xs gap-1.5 font-mono font-semibold text-neutral-content cursor-pointer px-2.5 py-1">
                                <x-icons.copy_icon/>
                                Copy Snippet
                            </button>
                        </header>
                        <pre class="rounded-b-xl"><code class="rounded-b-xl"></code></pre>
                    </div>

                    <footer>
                        <div class="flex items-center gap-1.5 font-semibold text-sm text-neutral-content">
                            <x-icons.comment_icon width="14" height="14"/>
                            {{  $post->comments()->count() }} comments
                        </div>
                    </footer>
                </section>
            </article>
        </div>
    </main>

    <x-layout._footer/>
</x-layout>
