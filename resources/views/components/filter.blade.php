<div class="flex sm:mx-14 md:gap-3 md:mx-14 my-3 mx-auto justify-center">
    <div class="text-xs sm:text-base mt-3 text-[#73828c]">
        カテゴリ検索
    </div>
    <div class="flex sm:mx-4 my-1">
        <div class="text-xs sm:text-base flex sm:w-auto">
            <x-category-modal 
                title="typeA"
                :categoryList="config('category.post')"
                modalName="postCategory"
                categoryName="postCategory"
                formOrFilter="すべて"
            />
            <x-category-modal 
                title="typeB"
                :categoryList="config('category.typeB')"
                modalName="typeBCategory"
                categoryName="typeBCategory"
                formOrFilter="すべて"
            />
            <x-category-modal 
                title="対象"
                :categoryList="config('category.toWhom')"
                modalName="toWhomCategory"
                categoryName="toWhomCategory"
                formOrFilter="すべて"
            />
        </div>
        <button type="submit" class="sm:ml-2 text-xs sm:text-base px-2 py-1 sm:w-auto bg-sky-500 shadow-sky-500/50 text-white hover:text-white hover:bg-sky-300 transition-colors duration-500 rounded">
            絞り込む
        </button>
    </div>
</div>