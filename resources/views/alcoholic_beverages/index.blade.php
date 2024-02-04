<html>

<head>
    <title>htmx を使った CRUD サンプル</title>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <script src="https://cdn.tailwindcss.com/3.4.1"></script>
</head>

<body>
    <div class="p-5">
        <h1 class="text-3xl mb-5">htmx を使った CRUD サンプル</h1>
        <div class="mb-4">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                hx-get="{{ route('alcoholic_beverage.create') }}" hx-target="#form">
                新規作成
            </a>
        </div>
        <div class="flex gap-5">
            <div class="flex-1">
                <table id="table" hx-get="{{ route('alcoholic_beverage.list') }}" hx-trigger="load, reload"
                    class="border border-collapse w-full">
                </table>
            </div>
            <div class="flex-1">
                <div id="form"></div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('htmx:configRequest', function(event) {

            event.detail.headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}'; // CSRF トークンをセット

        });

        document.addEventListener('htmx:afterRequest', (e) => { // Ajax リクエストが実行されたとき

            const shouldUpdateTable = e.target.id === 'form' || e.target.classList.contains('delete-button');

            if (shouldUpdateTable === true) { // 登録・更新・削除した場合

                const xhr = e.detail.xhr;
                const status = xhr.getResponseHeader('X-Response-Status');

                if (status === 'success') { // 実行が成功した場合

                    htmx.trigger('#table', 'reload'); // テーブルを更新

                }

            }

        });
    </script>
</body>

</html>
