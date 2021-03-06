@props(['comment'])
<x-panel class="bg-gray-50 ">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" width="60" height="60" alt="" class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-semibold">{{ $comment->author->name }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at }}</time>
                </p>
                <p>
                    {{ $comment->body }}
                </p>
            </header>
        </div>
    </article>
</x-panel>