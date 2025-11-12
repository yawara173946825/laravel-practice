<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('記事一覧') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- 記事一覧 --}}
                    @if($articles->isEmpty())
                        <p class="text-gray-500 text-center py-8">まだ記事がありません。</p>
                    @else
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($articles as $article)
                                <div class="bg-gray-50 dark:bg-gray-900 rounded-xl shadow hover:shadow-lg transition p-6">
                                    {{-- タイトル --}}
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">
                                        {{-- <a href="{{ route('articles.show', $article->id) }}" class="hover:underline"> --}}
                                            {{ $article->title }}
                                        </a>
                                    </h3>

                                    {{-- 投稿日 --}}
                                    <p class="text-sm text-gray-500 mb-3">
                                        投稿日: {{ $article->created_at->format('Y年m月d日') }}
                                    </p>

                                    {{-- 本文（抜粋） --}}
                                    <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3">
                                        {{ Str::limit(strip_tags($article->content), 100, '...') }}
                                    </p>

                                    {{-- ボタン --}}
                                    <div class="text-right">
                                        {{-- <a href="{{ route('articles.show', $article->id) }}" --}}
                                           {{-- class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg transition"> --}}
                                            詳細を見る
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
