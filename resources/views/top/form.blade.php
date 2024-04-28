<div class="m-3 w-11/12 sm:w-4/5 lg:w-2/3 mx-auto">
    <div class="bg-[#1A2433] rounded p-3 md:p-4 shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
        <h2 class="text-lg text-white">投稿する</h2>
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <br>
            <div class="md:mx-3">
                <input type="hidden" name="user_id" value="{{ Auth::check() ? Auth::id() : 0 }}">
                <input id="title" name="title" class="input text-base mb-2 shadow appearance-none rounded w-full py-2 px-3 leading-tight" value="{{ old('title') }}" type="text" placeholder="タイトル（なし可）">
                <textarea id="content" name="content" class="text-base input shadow appearance-none rounded w-full py-2 px-3 leading-tight" rows="10" placeholder="内容を入力してください。"></textarea>
                    @if ($errors->has('content'))
                        <div class="text-[#73828c]">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                <div class="flex justify-between sm:mx-4 my-1">
                    <div class="text-xs sm:text-base flex sm:w-auto">
                        <x-category-modal 
                            title="typeA"
                            :categoryList="config('category.post')"
                            modalName="postCategory/"
                            categoryName="postCategory"
                            formOrFilter="選択しない"
                        />
                        <x-category-modal 
                            title="typeB"
                            :categoryList="config('category.typeB')"
                            modalName="typeBCategory/"
                            categoryName="typeBCategory"
                            formOrFilter="選択しない"
                        />
                        <x-category-modal 
                            title="対象"
                            :categoryList="config('category.toWhom')"
                            modalName="toWhomCategory/"
                            categoryName="toWhomCategory"
                            formOrFilter="選択しない"
                        />
                    </div>
                    <button type="submit" class="text-xs sm:text-base px-2 py-1 sm:w-auto bg-sky-500 shadow-sky-500/50 text-white hover:text-white hover:bg-sky-300 transition-colors duration-500 rounded">
                        投稿する
                    </button>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('form').addEventListener('submit', function() {
                        document.querySelector('[type="submit"]').disabled = true;
                    });
                });
            </script> 
        </form>
    </div>
</div>


