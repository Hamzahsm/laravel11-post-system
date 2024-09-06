<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3>Blog Terbaru</h3>
    
    @foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div>
            <a href="#">{{ $post['author'] }}</a> | <a href="#">{{ $post->created_at->format('j F Y') }}</a>
            {{-- <a href="#">{{ $post['author'] }}</a> | <a href="#">{{ $post->created_at->diffForHumans() }}</a> --}}
        </div class="text-base text-gray-500">
        <p class="my-4 font-light">
            {{ Str::limit($post['body'], 30) }}
            <!-- function Str limit adalah untuk membatas jumlah karakter konten -->
        </p>

        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read More &raquo;</a>
    </article> 
    @endforeach
    
</x-layout>