<button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $modalName }}')" class="px-2 py-1 flex-1 mx-1 sm:px-4 sm:py-2 sm:mx-2 border-2 rounded text-[#73828c] text-base border-[#73828c] hover:text-white hover:border-white hover:bg-sky-400 transition-colors duration-500">
    {{ $title }}
</button>

 <x-modal name="{{ $modalName }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-[#11191f] rounded shadow-lg">
        <div class="flex justify-between">
            <!-- Title / Close-->
            <h5 class="mx-3 text-white max-w-none text-lg font-bold">{{ $title }}</h5>
            <button type="button" class="mx-3 text-white max-w-none text-lg" x-on:click="$dispatch('close')">閉じる</button>    
        </div>

        <hr class="border-t-2 mt-1 mb-3 border-gray-600">

        <!-- Content -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 justify-items-center text-base sm:text-lg">
            @foreach($categoryList as $index => $category)
            <div class="categoryButton">
                <input name="{{ $categoryName }}" value="{{ $index }}" id="{{ $categoryName }}-{{ $index }}-{{ $formOrFilter }}" type="radio">
                <label for="{{ $categoryName }}-{{ $index }}-{{ $formOrFilter }}" >{{ $category['name'] }}</label>
            </div>
            @endforeach
        </div>
        <br>
        <div class="grid grid-cols-2 gap-4 justify-items-center text-sm sm:text-lg">
            <div class="categoryButton">
                <input name="{{ $categoryName }}" value="99" id="{{ $categoryName }}-other-{{ $formOrFilter }}" type="radio">
                <label for="{{ $categoryName }}-other-{{ $formOrFilter }}">その他</label>
            </div>
            <div class="categoryButton">
                <input name="{{ $categoryName }}" value="100" id="{{ $categoryName }}-nothing-{{ $formOrFilter }}" type="radio" checked>
                <label for="{{ $categoryName }}-nothing-{{ $formOrFilter }}">{{ $formOrFilter }}</label>
            </div>
        </div>
    </div>
 </x-modal>