<form hx-post="{{ route('alcoholic_beverage.store') }}" hx-target="this" hx-swap="outerHTML">
    @csrf
    <div class="mb-3">
        <input type="text" name="name" class="border border-gray-500 p-3" placeholder="名前" value="{{ $name ?? '' }}">
        @if ($errors->has('name'))
            <div class="text-red-500 p-1">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <input type="text" name="alcohol_content" class="border border-gray-500 p-3" placeholder="アルコール度数"
            value="{{ $alcohol_content ?? '' }}">
        @if ($errors->has('alcohol_content'))
            <div class="text-red-500 p-1">{{ $errors->first('alcohol_content') }}</div>
        @endif
    </div>
    <div class="mb-3">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            保存
        </button>
        @if (isset($status) && $status === 'success')
            <div class="text-green-500 pt-2">保存しました</div>
        @endif
    </div>
</form>
