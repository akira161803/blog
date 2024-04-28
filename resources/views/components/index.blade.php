<ul>
    @foreach ($posts as $post)
        @if (!is_null($post->user) && $post->user->name == '神')
            @include('components.origin-post')
        @else
            <div class="mx-4 py-2 sm:px-6 sm:py-4 md:w-3/4">
                <div class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} w-full rounded-xl px-5 sm:px-10 py-4 sm:py-8 shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">        
                    <li>
                        @if ($post->title)
                            <div class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} break-words text-lg md:text-3xl font-bold whitespace-pre-wrap">{{ $post->title }}</div>
                        @endif
                        <br>
                        <div class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }} break-words text-base md:text-xl whitespace-pre-wrap">{{ $post->content }}</div>
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
                        <div class="xl:flex text-base md:text-lg">
                            @if ($post->user)
                                <p class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">投稿者 : </span>{{ $post->user->name }}</p>
                            @else
                                <p class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">投稿者 : </span>名も無き巡礼者さん</p>
                            @endif
                            <div class="sm:flex">
                                <p class="xl:mx-3 mr-3 {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}"><span class="font-bold">投稿日時 : </span><span class="inline-block">{{ $post->created_at }}</span></p>
                                <p class="{{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}">{{ $post->created_at->diffForHumans() }}</p>
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
                                    <a @click.prevent="unlikepost()" href="#" class="sm:ml-3 hover:underline font-bold">投稿を捧げました！</a>
                                </template>
                            </div>
                        @else
                            <div class="sm:flex text-base md:text-lg">
                                <p class="badge font-bold {{ $getpostCategoryClass($post->postCategory) }} {{ $gettypeBCategoryClass($post->typeBCategory) }}">
                                    みんなからの投稿：{{ $post->nices->count() }}
                                </p>
                                <a href="{{ route('register') }}" class="sm:ml-3 hover:underline font-bold">いいね</a>
                            </div>
                        @endif
                    </li>
                </div>
            </div>
        @endif
    @endforeach
    <script>
        function postHandler(isLiked, postId, initialLikes) {
            return {
                niced: isLiked,
                likes: Number(initialLikes),
                postId: postId,
                likepost() {
                    fetch(`/posts/${this.postId}/nice`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'Nice added') {
                            this.niced = true;
                            this.likes = Number(this.likes) + 1;
                        }
                    })
                    .catch(error => console.error('Error:', error));
                },
                unlikepost() {
                    fetch(`/posts/${this.postId}/unnice`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'Nice removed') {
                            this.niced = false;
                            this.likes = Number(this.likes) - 1;
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            };
        }
    </script>        
</ul>
<div class="mt-8 overflow-x-auto sm:flex sm:justify-center">
    {{ $posts->links('vendor.pagination.tailwind') }}
</div>
