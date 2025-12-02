<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('記事詳細') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-4 py-4 flex justify-end">
            @if (auth()->id() === $article->user_id)
                {{-- 各ボタンへのアクセス --}}
                <a href="{{ route('articles.edit', $article->id) }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    編集
                </a>
            @endif
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">

        {{-- 成功メッセージ --}}
        @if(session('success'))
          <div class="mb-4 p-4 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded-lg">
            {{ session('success') }}
          </div>
        @endif

        {{-- エラーメッセージ --}}
        @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 rounded-lg">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif


        {{-- タイトル --}}
        <h1 class="text-4xl font-bold mb-8 text-gray-900 dark:text-gray-100">
            {{ $article->title }}
        </h1>

        <div class="prose prose-lg dark:prose-invert max-w-none leading-relaxed">
        @foreach (explode("\n", $article->body) as $paragraph)
            @if (trim($paragraph) !== '')
            <p>{{ $paragraph }}</p>
            @endif
        @endforeach
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
