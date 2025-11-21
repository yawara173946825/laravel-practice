<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('記事編集') }}
    </h2>
  </x-slot>

  <div class="py-12 flex justify-center">
    <div class="w-full sm:max-w-xl px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

        {{-- 成功メッセージ --}}
        @if(session('success'))
          <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
          </div>
        @endif

        {{-- エラーメッセージ --}}
        @if ($errors->any())
          <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- 記事作成フォーム --}}
        <form action="{{ route('articles.update', $article->id) }}" method="POST" class="space-y-6">
          @csrf
          @method('PATCH')

          <div>
            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">タイトル</label>
            <input
              type="text"
              name="title"
              id="title"
              value="{{ old('title', $article->title) }}"
              class="w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"
              required
            >
          </div>

          <div>
            <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">本文</label>
            <textarea
              name="body"
              id="body"
              rows="6"
              class="w-full mt-1 px-4 py-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600"
              required
            >{{ old('body', $article->body) }}</textarea>
          </div>

          <div>
            <button
              type="submit"
              class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
            >
              投稿する
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
