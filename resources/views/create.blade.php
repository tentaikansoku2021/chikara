<x-app>
    <div class="bg-yellow-100">
        <div class="">
            <div class="text-left">
                <h2 class="text-lg pt-2">文房具登録画面</h2>
            </div>
            <x-primary-button class='my-2'><a href="{{url('/bunbougu')}}">戻る</a></x-primary-button>
        </div>
    </div>
    <div class="w-3/4 mx-auto">
        <form action="{{route('bunbougu.store')}}" method="POST">
            @csrf
            <div class="">
                <div class="mb-4 mt-4">
                    <input type="text" name="name" class="w-full" placeholder="名前">
                    @error('name')
                    <span class="text-red-800">名前を20文字以内で入力してください</span>
                    @enderror
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="price" class="w-full" placeholder="価格">
                    @error('name')
                    <span class="text-red-800">数字で入力してください</span>
                    @enderror
                </div>

                <div class="mb-4 mt-4">
                    <select name="classification" class="w-full">
                        <option value="">分類を選択してください</option>
                        @foreach($classifications as $classification)
                        <option value="{{ $classification->id }}">{{ $classification->str }}</option>
                        @endforeach
                    </select>
                    @error('classification')
                    <span class="text-red-800">分類を選んでください</span>
                    @enderror
                </div>

                <div class="mb-4 mt-4">
                    <textarea type="" name="detail" class="w-full" placeholder="詳細"></textarea>
                    @error('detail')
                    <span class="text-red-800">140文字以内で入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 mt-4 w-full ">
                <x-primary-button2>登 録</x-primary-button2>
            </div>
        </form>
    </div>
</x-app>