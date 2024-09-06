<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>Blog Terbaru</h3>
    
    <article class="py-8 max-w-screen-md ">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div>
            <a href="#">{{ $post['author'] }}</a> | <a href="#">2 Januari</a>
        </div class="text-base text-gray-500">
        <p class="my-4 font-light">
            {{ $post['body'] }}
        </p>

        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back To Post </a>
    </article> 
    
</x-layout>