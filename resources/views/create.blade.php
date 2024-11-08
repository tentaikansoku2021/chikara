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
                    <input type="text" name="name" class="w-full" placeholder="名前" value="{{old('name')}}">
                    @error('name')
                    <span class="text-red-700">名前を20文字以内で入力してください</span>
                    @enderror
                </div>
                <div class="mb-4 mt-4">
                    <input type="text" name="price" class="w-full" placeholder="価格" value="{{old('price')}}">
                    @error('price')
                    <span class="text-red-700">数字で入力してください</span>
                    @enderror
                </div>

                <div class="mb-4 mt-4">
                    <select name="classification" class="w-full">
                        <option value="" name="classification">分類を選択してください</option>
                        @foreach($classifications as $classification)
                        <option value="{{ $classification->id }}"
                        @if(old('classification') == $classification->id) selected @endif>{{ $classification->str }}</option>
                        @endforeach
                    </select>
                    @error('classification')
                    <span class="text-red-700">分類を選択してください</span>
                    @enderror
                </div>

                <div class="mb-4 mt-4">
                    <textarea name="detail" class="w-full" placeholder="詳細">{{old('detail')}}</textarea>
                    @error('detail')
                    <span class="text-red-700">140文字以内で入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 mt-4 w-full ">
                <x-primary-button2>登 録</x-primary-button2>
            </div>
        </form>
    </div>
</x-app>