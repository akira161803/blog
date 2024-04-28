@extends('parts.common')
@section('content')
    <x-modal2 name="submissionModal" :show="session('status') == 'm-submitted'" focusable>
        <div class="p-5 sm:p-8 sm:text-lg">
            <p>
                <span class="inline-block">投稿を保存しました！</span>
            </p>
        </div>
    </x-modal2>

    <header class="mt-20 font-semibold text-xl sm:text-3xl text-white leading-tight bg-[#11191f] shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        自分の投稿
    </header>
    <form action="{{ route('myPageMyIndexFilter') }}" method="GET">
        @csrf
        @include('components.filter')
    </form>
    <div class="mt-5">
        @if ($posts->isEmpty())
            <p class="mx-10 mt-10">投稿はありません。</p>
        @else
            @include('components.myIndex')
        @endif
    </div>
@endsection

