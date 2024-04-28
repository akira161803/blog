<ul>
    @foreach ($posts as $post)
    <div class="mx-4 py-2 sm:px-6 sm:py-4 md:w-3/4">
        <div class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} w-full rounded-xl px-5 sm:px-10 py-4 sm:py-8 shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">        
            <li>
                @if ($post->title)
                    <div class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} text-lg md:text-3xl font-bold break-words whitespace-pre-wrap">{{ $post->title }}</div>
                @endif
                <br>
                <div class="text-base md:text-lg {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} break-words whitespace-pre-wrap">{{ $post->content }}</div>
                <br>
                <div class="sm:flex text-base md:text-lg">
                    @if ($post->postCategory !== 99 && $post->postCategory !== 100)
                        <p class="sm:mr-2 {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">typeA：</span>{{ config('category.post')[$post->postCategory]['name'] }}</p>
                    @endif
                    @if ($post->typeBCategory !== 99 && $post->typeBCategory !== 100)
                        <p class="sm:mr-2 {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">typeB：</span>{{ config('category.typeB')[$post->typeBCategory]['name'] }}</p>
                    @endif
                    @if ($post->toWhomCategory !== 99 && $post->toWhomCategory !== 100)
                        <p class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">対象：</span>{{ config('category.toWhom')[$post->toWhomCategory]['name'] }}</p>
                    @endif
                </div>
                <br>
                <div class="flex text-base md:text-lg">
                    <p class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} font-bold">みんなからの投稿：{{ $post->nices->count() }}</p>
                    <form action="{{ route('myPageDelete', ['id'=>$post->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="ml-5 hover:underline font-bold" onclick="return confirm('本当に削除しますか？')">削除</button>
                    </form>                    
                </div>
            </li>
        </div>
    </div>
    @endforeach
</ul>
<div class="mt-8 overflow-x-auto sm:flex sm:justify-center">
    {{ $posts->links('vendor.pagination.tailwind') }}
</div>