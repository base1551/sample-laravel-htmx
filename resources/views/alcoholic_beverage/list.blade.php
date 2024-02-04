<thead>
    <tr>
        <th class="border border-gray-500 bg-gray-100 p-1">名前</th>
        <th class="border border-gray-500 bg-gray-100 p-1">度数</th>
        <th class="border border-gray-500 bg-gray-100 p-1">操作</th>
    </tr>
</thead>
<tbody>
    @foreach ($alcoholic_beverages as $alcoholic_beverage)
        <tr>
            <td class="border border-gray-500 p-3">{{ $alcoholic_beverage->name }}</td>
            <td class="border border-gray-500 p-3">{{ $alcoholic_beverage->alcohol_content }}</td>
            <td class="border border-gray-500 p-3 text-center w-48">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2"
                    hx-get="{{ route('alcoholic_beverage.edit', ['alcoholic_beverage' => $alcoholic_beverage]) }}"
                    hx-target="#form">
                    編集
                </a>
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded delete-button"
                    hx-delete="{{ route('alcoholic_beverage.destroy', ['alcoholic_beverage' => $alcoholic_beverage]) }}"
                    hx-confirm="本当に削除しますか？">
                    削除
                </a>
            </td>
        </tr>
    @endforeach
</tbody>
