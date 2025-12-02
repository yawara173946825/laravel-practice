<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            マイ記事一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-4">
                @foreach ($articles as $article)
                        <a href="{{ route('articles.show', $article) }}"
                           class="block p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition">

                            <div class="flex justify-between items-start">
                                <!-- タイトル -->
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $article->title }}
                                </h3>

                                <!-- 作成日 -->
                                <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap ml-4">
                                    {{ $article->created_at->format('Y-m-d') }}
                                </span>
                            </div>

                            <!-- サマリー （本文の一部など） -->
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2 line-clamp-2">
                                {{ $article->excerpt ?? Str::limit($article->content, 100) }}
                            </p>

                            <span class="text-sm text-blue-600 dark:text-blue-400 font-medium mt-2 inline-block">
                                続きを読む →
                            </span>
                        </a>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
