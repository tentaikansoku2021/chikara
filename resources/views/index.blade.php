<x-app>
    
    <div class="bg-yellow-100">
        <div class="">
            <div class="text-left">
                <h2 class="text-lg pt-2">文房具マスター</h2>
            </div>
            <x-primary-button class='my-2'><a href="{{route('bunbougu.create')}}">新規登録</a></x-primary-button>
        </div>
    </div>

    <table class="w-full text-left rtl:text-right dark:text-gray-400 my-4">
        <thead class="uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">name</th>
                <th class="px-6 py-3">price</th>
                <th class="px-6 py-3">classification</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bunbougus as $bunbougu)
            <tr  class="even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-3 text-right">{{ $bunbougu->id }}</td>
                <td class="px-6 py-3">{{ $bunbougu->name }}</td>
                <td class="px-6 py-3 text-right">{{ $bunbougu->price }}</td>
                <td class="px-6 py-3 text-right">{{ $bunbougu->classification }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


    
    {{  $bunbougus->links()}}
</x-app>