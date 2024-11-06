<x-app>
    <div class="bg-yellow-100">
        <div class="">
            <div class="text-left">
                <h2 class="text-lg pt-2">文房具マスター</h2>
            </div>
            <x-primary-button class='my-2'>新規登録</x-primary-button>
        </div>
    </div>

    <table class="table-auto">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>price</th>
            <th>classification</th>
        </tr>
        @foreach ($bunbougus as $bunbougu)
        <tr>
            <td class="text-right">{{ $bunbougu->id }}</td>
            <td>{{ $bunbougu->name }}</td>
            <td class="text-right">{{ $bunbougu->price }}</td>
            <td class="text-right">{{ $bunbougu->classification }}</td>
        </tr>
        @endforeach
    </table>

    {{  $bunbougus->links()}}
</x-app>