@php
    $categories = [
        'React',
        'Vue.js',
        'TypeScript',
        'CSS',
        'Node.js',
        'Python',
        'SQL',
        'Architecture',
        'Performance',
    ];
@endphp

<x-layout>
    @include('components.layout._header')

    <main class="flex justify-center min-h-screen">
        <section class="pt-11.75 flex flex-col gap-6">
            <div>
                <div>
                    <a href="{{ route('posts.index') }}"
                        class="inline-flex items-center text-muted-foreground font-semibold text-sm gap-2">
                        <x-icons.back-arrow_icon />
                        Back to Feed
                    </a>
                </div>
            </div>

            <div>
                <h1 class="font-display font-bold text-4xl leading-10 tracking-[-0.09px] text-white">Create a Tip</h1>
                <p class="leading-6 text-[16px] text-muted-foreground mt-1.5">Contribute a developper snippet, trick, or architectural best practice to the network.</p>
            </div>

            <form method="POST" :action="{{ route('posts.create') }}" class="px-8 py-10 bg-background-secondary rounded-2xl border border-border flex flex-col gap-6">
                <fieldset class="">
                    <legend class="mb-2.5 tracking-[0.06rem font-display font-semibold text-xs uppercase">Categories</legend>

                    <div x-data="{indexButton: 0, selectedButton: 'react'}">
                        @foreach ($categories as $key => $category)
                            <button
                                type="button"
                                class="cursor-pointer px-3.5 py-1.5 rounded-lg  text-neutral-content border border-border font-medium text-sm"
                                @click="indexButton = {{ $key }}; selectedButton = {{ Js::from(strtolower($category)) }}"
                                :class="indexButton === {{ $key }} ? 'bg-primary font-semibold text-primary-content' : 'bg-snippet'"
                                >
                                {{ $category }}
                            </button>
                        @endforeach

                        <input type="hidden" name="category" :value="selectedButton"/>
                    </div>
                </fieldset>

                <label x-data="{max: ''}">
                    <div class="flex justify-between items-center font-display text-xs mb-2">
                        <span class="font-semibold uppercase tracking-[0.06rem]">Title</span>
                        <span x-text="max.length + '/120'"></span>
                    </div>
                    <input type="text" maxlength="120" x-model="max" name="title" placeholder="e.g., Prevent unnecessary re-renders with useTransition" class="w-full bg-snippet px-4 py-3.5 outline-none rounded-[14px] text-4 text-white border border-border" required/>
                </label>

                <label class="flex flex-col gap-2">
                    <span class="font-display font-semibold text-xs tracking-[0.06rem] uppercase">Explanation & context</span>
                    <textarea name="description" placeholder="Briefly explain the bottleneck, why this solution is superior, and where to apply it..." rows="5" class="bg-snippet outline-none text-white px-4 pt-2.75 rounded-lg border border-border   "></textarea>
                </label>

                <div>
                    <div class="flex items-center justify-between mb-2.5">
                        <span class="font-display text-xs font-semibold tracking-[0.06rem] uppercase">Code snippet</span>

                        <label>
                            <select name="language" class="rounded-lg border border-border bg-snippet py-2 pl-3 text-xs">
                                <option value="typescript">TypeScript</option>
                                <option value="javascript">JavaScript</option>
                                <option value="python">Python</option>
                                <option value="sql">SQL</option>
                                <option value="css">CSS</option>
                            </select>
                        </label>
                    </div>

                    <div class="bg-snippet rounded-lg border border-border">
                        <div class="flex items-center gap-2 border-b border-b-border">
                            <div class="flex items-center gap-1.5 px-4 py-2.5">
                                <span class="rounded-full size-2.5 inline-block bg-macos-close/80"></span>
                                <span class="rounded-full size-2.5 inline-block bg-macos-minimize/80"></span>
                                <span class="rounded-full size-2.5 inline-block bg-macos-zoom/80"></span>
                            </div>

                            <span class="font-mono font-medium text-xs lowercase opacity-90">snippet.tsx</span>
                        </div>

                        <div class="p-4">
                            <label>
                                <textarea name="code" rows="10" placeholder="// Write or paste your snippet here..." class="w-full border border-[#6B7280] px-3 py-2 outline-none font-mono text-xs text-white"></textarea>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="border-t border-t-border-foreground pt-4 flex justify-end items-center gap-3">
                        Cancel
                    </a>

                    <button type="submit" class="cursor-pointer flex items-center capitalize gap-2 text-accent-content font-display font-bold text-sm px-6 py-2.5 bg-primary rounded-lg">
                        <x-icons.submit_icon/>
                        Publish tip
                    </button>
                </div>
            </form>
        </section>
    </main>

</x-layout>
