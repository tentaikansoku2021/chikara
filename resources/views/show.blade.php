<x-app>
    <div class="bg-yellow-100">
        <div class="">
            <div class="text-left">
                <h2 class="text-lg pt-2">文房具詳細画面</h2>
            </div>
            <x-primary-button class='my-2'><a href="{{url('/bunbougu')}}?page={{$page_id}}">戻る</a></x-primary-button>
        </div>
    </div>
    <div class="w-3/4 mx-auto">
        <div class="">
            <div class="mb-4 mt-4">
                <label for="">Name</label>
                <input type="text" name="name" class="w-full" placeholder="名前" value="{{$bunbougu->name}}">
            </div>
            <div class="mb-4 mt-4">
            <label for="">Price</label>
                <input type="text" name="price" class="w-full" placeholder="価格" value="{{$bunbougu->price}}">
            </div>

            <div class="mb-4 mt-4 ">
            <label for="">Classification</label>
                <div class="w-full p-2 border-solid border-[1px] border-slate-700">                  
                    @foreach($classifications as $classification)
                        @if($classification->id==$bunbougu->classification) {{ $classification->str }} @endif
                    @endforeach
                </div>             
            </div>

            <div class="mb-4 mt-4">
            <label for="">Detail</label>
                <textarea name="detail" class="w-full" placeholder="詳細">{{$bunbougu->detail}}</textarea>
            </div>
        </div>
    </div>
</x-app>