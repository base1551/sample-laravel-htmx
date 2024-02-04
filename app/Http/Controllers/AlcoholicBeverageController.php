<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlcoholicBeverageRequest; // AlcoholicBeverageのリクエストを扱うクラスをインポート
use App\Models\AlcoholicBeverage; // AlcoholicBeverageモデルをインポート
use Illuminate\Http\Request; // HTTPリクエストを扱うクラスをインポート

class AlcoholicBeverageController extends Controller
{
    public function index()
    {
        // アルコール飲料のインデックスページを表示
        return view('alcoholic_beverage.index');
    }

    public function list()
    {
        // 最新のアルコール飲料をページネーションで取得
        $alcoholic_beverages = AlcoholicBeverage::latest()->paginate();

        // アルコール飲料のリストページを表示
        return view('alcoholic_beverage.list', [
            'alcoholic_beverages' => $alcoholic_beverages
        ]);
    }

    public function create()
    {
        // アルコール飲料の作成ページを表示
        return view('alcoholic_beverage.create');
    }

    public function store(AlcoholicBeverageRequest $request)
    {
        // 新しいアルコール飲料を作成して保存
        $alcoholic_beverage = new AlcoholicBeverage();
        $alcoholic_beverage->name = $request->name;
        $alcoholic_beverage->alcohol_content = $request->alcohol_content;
        $alcoholic_beverage->save();

        // 作成後のレスポンスを返す
        return response()
            ->view('alcoholic_beverage.create', [
                'status' => 'success',
            ])
            ->withHeaders([
                'X-Response-Status' => 'success',
            ]);
    }

    public function show(AlcoholicBeverage $alcoholic_beverage)
    {
        // アルコール飲料の詳細ページを表示
        return view('alcoholic_beverage.show', [
            'alcoholic_beverage' => $alcoholic_beverage
        ]);
    }

    public function edit(AlcoholicBeverage $alcoholic_beverage)
    {
        // アルコール飲料の編集ページを表示
        return view('alcoholic_beverage.edit', [
            'alcoholic_beverage' => $alcoholic_beverage,
            'name' => $alcoholic_beverage->name,
            'alcohol_content' => $alcoholic_beverage->alcohol_content,
        ]);
    }

    public function update(AlcoholicBeverageRequest $request, AlcoholicBeverage $alcoholic_beverage)
    {
        // アルコール飲料の情報を更新して保存
        $alcoholic_beverage->name = $request->name;
        $alcoholic_beverage->alcohol_content = $request->alcohol_content;
        $alcoholic_beverage->save();

        // 更新後のレスポンスを返す
        return response()
            ->view('alcoholic_beverage.edit', [
                'status' => 'success',
                'alcoholic_beverage' => $alcoholic_beverage,
                'name' => $alcoholic_beverage->name,
                'alcohol_content' => $alcoholic_beverage->alcohol_content,
            ])
            ->withHeaders([
                'X-Response-Status' => 'success',
            ]);
    }

    public function destroy(AlcoholicBeverage $alcoholic_beverage)
    {
        // アルコール飲料を削除（削除権限のチェックは省略しています）

        $alcoholic_beverage->delete();

        // 削除後のレスポンスを返す
        return response('', 204)
            ->withHeaders([
                'X-Response-Status' => 'success',
            ]);
    }
}
