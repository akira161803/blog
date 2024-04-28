<section class="">
    <div class="lg:flex justify-items-center">
        <h2 class="sm:mx-14 text-xl sm:text-3xl mx-3 font-bold">最新の投稿</h2>
        <form action="{{ route('filter') }}" method="GET">
            @csrf
            @include('components.filter')
        </form>
    </div>
    <div class="lg:mt-8">
        @include('components.index')
    </div>
</section>

