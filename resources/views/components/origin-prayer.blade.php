<div class="mx-4 py-2 sm:px-6 sm:py-4 md:w-3/4">
    <div class="bg-black w-full rounded-xl px-5 sm:px-10 py-4 sm:py-8 shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
        <li>
            @if ($post->title)
                <div class="text-lg md:text-3xl font-bold break-words whitespace-pre-wrap">{{ $post->title }}</div>
            @endif
            <br>
            <div class="text-base md:text-lg break-words whitespace-pre-wrap">{{ $post->content }}</div>
            <br>
            <div class="xl:flex text-base md:text-lg">
                <p class=""><span class="font-bold">投稿者 : </span>The Founder</p>
                <div class="sm:flex">
                    <p class="xl:mx-3 mr-3 "><span class="font-bold">投稿日時 : </span><span class="inline-block">0000-00-00 00:00:00</span></p>
                </div>
            </div>
            <br>
            @if(Auth::check())
                <div x-data="postHandler(@json($post->nices->contains('user_id', auth()->user()->id)), {{ $post->id }}, {{ $post->nices->count() }})" class="sm:flex text-base md:text-lg">
                    <p class="badge font-bold {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}">
                        <!-- リアクティブなlikes変数に基づいて表示 -->
                        <span x-text="'みんなからの投稿：' + likes"></span>
                        <!-- likes変数が未定義またはnullの場合のみ表示 -->
                        <span x-show="typeof likes === 'undefined' || likes === null">みんなからの投稿：{{ $post->nices->count() }}</span>
                    </p>
                    <template x-if="!niced">
                        <a @click.prevent="likepost()" href="#" class="sm:ml-3 hover:underline font-bold">いいね</a>
                    </template>
                    <template x-if="niced">
                        <a @click.prevent="unlikepost()" href="#" class="sm:ml-3 hover:underline font-bold">いいねを押しました！</a>
                    </template>
                </div>
            @else
                <div class="sm:flex text-base md:text-lg">
                    <p class="badge font-bold">
                        みんなからの投稿：{{ $post->nices->count() }}
                    </p>
                    <a href="{{ route('register') }}" class="sm:ml-3 hover:underline font-bold">いいね</a>
                </div>
            @endif
        </li>
    </div>
</div>