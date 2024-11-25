<x-app>

    <div class="bg-yellow-100">
        <div class="">
            <div class="text-left">
                <h2 class="text-lg pt-2">文房具マスター</h2>
            </div>
            @auth
            <x-primary-button class='my-2'><a href="{{route('bunbougu.create')}}">新規登録</a></x-primary-button>
            @endauth
            @guest
            <x-primary-button class="ml-8"><a href="login">log-in</a></x-primary-button>
            @endguest
        </div>
    </div>

    @if(session('flash_message'))
    <div class="h-9 p-2 bg-green-100 text-lime-900 opacity-80">
        {{ session('flash_message') }}
    </div>
    @endif
    @if(session('flash_error_message'))
    <div class="h-9 p-2 bg-red-300 text-slate-800 opacity-80">
        {{ session('flash_error_message') }}
    </div>
    @endif

    <table class="w-full text-left rtl:text-right dark:text-gray-400 my-4">
        <thead class="uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3 w-32 text-right">No</th>
                <th class="px-6 py-3">name</th>
                <th class="px-6 py-3 text-right">price</th>
                <th class="px-6 py-3 w-16">classification</th>
                <th></th>
                <th>editor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bunbougus as $bunbougu)
            <tr class="even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-3 text-right">
                    @auth<x-primary-button class="float-left"><a href="{{route('bunbougu.edit',$bunbougu->id)}}?page_id={{$page_id}}">変更</a></x-primary-button>@endauth
                    {{ $bunbougu->id }}
                </td>
                <td class="px-6 py-3"><a class="text-blue-700 underline underline-offset-4" href="{{ route('bunbougu.show',$bunbougu->id) }}?page_id={{$page_id}}">{{ $bunbougu->name }}</a></td>
                <td class="px-6 py-3 text-right">{{ $bunbougu->price }}</td>
                <td class="px-6 py-3 text-left">{{ $bunbougu->classification }}</td>
                <td class="text-center">
                    <form action="{{route('bunbougu.destroy',$bunbougu->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        @auth<x-primary-button3><a onclick='return confirm("削除しますか？")'>削除</a></x-primary-button3>@endauth
                    </form>
                </td>
                <td>{{ $bunbougu->user_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>



    {{ $bunbougus->links()}}
</x-app>