@extends('parts.common')
@section('content')
    <header class="mt-20 font-semibold text-xl sm:text-3xl text-white leading-tight bg-[#11191f] shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        投稿する
    </header>
    <div class="m-3 sm:w-4/5 md:w-2/3 sm:mx-auto mb-36">
        <div class="bg-[#1A2433] p-3 sm:p-4 rounded shadow-lg shadow-sky-300 hover:shadow-2xl hover:shadow-sky-300 transition duration-500">
            <form id="myForm" method="POST" action="{{ route('myPageStore') }}">
                @csrf
                <div class="md:mx-3">
                    <input id="title" name="title" class="input mb-2 shadow appearance-none rounded w-full py-2 px-3 leading-tight text-base" value="{{ old('title') }}" type="text" placeholder="タイトル（なし可）">
                    <textarea id="content" name="content" class="input  shadow appearance-none rounded w-full py-2 px-3 leading-tight text-base" rows="10" placeholder="願い事の内容を入力してください。"></textarea>
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
                            modalName="postCategory"
                            categoryName="postCategory"
                            formOrFilter="選択しない"
                            />
                            <x-category-modal 
                                title="typeB"
                                :categoryList="config('category.typeB')"
                                modalName="typeBCategory"
                                categoryName="typeBCategory"
                                formOrFilter="選択しない"
                            />
                            <x-category-modal 
                                title="対象"
                                :categoryList="config('category.toWhom')"
                                modalName="toWhomCategory"
                                categoryName="toWhomCategory"
                                formOrFilter="選択しない"
                            />
                        </div>
                        <button type="submit" class="text-xs sm:text-base px-2 py-1 sm:w-auto bg-sky-500 shadow-sky-500/50 text-white hover:text-white hover:bg-sky-300 transition-colors duration-500 rounded">
                            投稿する
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('#myForm').addEventListener('submit', function() {
                document.querySelector('#myForm [type="submit"]').disabled = true;
            });
        });
    </script>
@endsection