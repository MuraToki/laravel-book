<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Book;
use App\Http\Requests\BookRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.form');
    }

    /**
     * 感想一覧
     * 
     * @return view
     */
    public function show()
    {
        $books = Book::all();
        return view('auth.list', ['books' => $books]);
    }

    /**
     * 詳細一覧
     * @param int $id
     * @return view
     */
    public function detail($id)
    {
        $book = Book::find($id);

        if (is_null($book)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        return view('auth.detail', ['book' => $book]);
    }

     /**
     * 登録画面を表示する
     * 
     * @return view
     */
    public function create() {
        return view('auth.form');
    }

     /**
     * 登録画面を登録する
     * 
     * @return view
     */
    public function store(BookRequest $request) {
        
        //感想のデータを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();

        try {
            //感想を登録する
            Book::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '感想を登録したよ');
        return redirect(route('show'));
    }

    /**
     * 編集画面を表示する
     * 
     * @return view
     */
    public function edit($id) {
        $book = Book::find($id);

        if (is_null($book)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        return view('auth.edit', ['book' => $book]);
    }
    
    /**
     * 画面を更新する
     * 
     * @return view
     */
    public function update(BookRequest $request){
        
        //感想のデータを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        
        try {
            //感想を登録する
            $book = Book::find($inputs['id']);
            \DB::commit();
            $book->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $book->save();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg', '感想を更新したよ');
        return redirect(route('show'));
    }

     /**
     * 編集画面を削除する
     * 
     * @return view
     */
    public function delete($id) {
        
        if (empty($id)) {
            \Session::flash('err_msg', 'データがないよ');
            return redirect(route('show'));
        }

        try {
            //a感想を削除
            Book::destroy($id);
        } catch (\Throwable $e) {
            abort(500);
        }
        
        \Session::flash('err_msg', '削除したよ');
        return redirect(route('show'));
    }

    
}