@extends("parts.common")
@section('content')
    <x-modal2 name="submissionModal" :show="session('status') == 'submitted'" focusable>
        <div class="p-5 sm:p-8 sm:text-lg">
            <p>
                <span class="inline-block">投稿を保存しました！</span>
            </p>
        </div>
    </x-modal2>
    <x-modal2 name="sessionModal" :show="session('status') == 'timeout'" focusable>
		<div class="p-5 sm:p-8 sm:text-lg">
			<p>
				<span class="inline-block">セッションがタイムアウトしました！</span>
				<span class="inline-block">再度やり直してください。</span>
			</p>
		</div>
	</x-modal2>

    
    @include("top.introduction")
    @include("top.form")
    <hr class="my-8 md:my-16 border-[#324054] mx-5">
    @include("top.postList")
@endsection
