@extends('parts.common')
@section('content')
    <header class="mt-20 font-semibold text-xl sm:text-3xl text-white leading-tight bg-[#11191f] shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        みんなの投稿
    </header>
    <form action="{{ route('myPageAllIndexFilter') }}" method="GET">
        @csrf
        <x-filter/>
    </form>
    <div class="mt-5">
        @if ($posts->isEmpty())
            <p class="mx-10 mt-10">投稿はありません。</p>
        @else
            @include('components.index')
        @endif
    </div>
@endsection
