<?php

namespace App\Http\Controllers;


use App\Models\HeroesPhoto;
use App\Models\Superhero;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HeroesEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero = Superhero::orderby('created_at', 'desc')->paginate(5);

        return view('home', ['hero' => $hero]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('editor.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nickname' => 'required|max:50',
            'real_name' => 'required',
            'original_description' => 'required',
            'superpower' => 'required',
            'catch_phrase' => 'required',
        ];
        $this->validate($request, $rules);
        $hero = new Superhero();
        $data = $request->all();

        $result = $hero
            ->fill($data)
            ->save();


        if($request->images) {

            $images = [];

            foreach ($request->images as $item)
            {
                $path = $item->store('uploads' , 'public');
                $str_path = substr($path, 8);
                $images[] = new HeroesPhoto( [
                    'hero_id' => $hero->id,
                    'images' => $str_path
                ]);

            }

            $id_hero = Superhero::find($hero->id);

            $id_hero->photos()->saveMany($images);

        }
        if($result){
            return redirect()
                ->route('editor-hero.show', ['hero' => $hero->id])
                ->with(['success' => 'Успешно сохранено!']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hero = Superhero::find($id);
        if(empty($hero)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена!"])
                ->withInput();
        }
        return view('editor.pages.show', [ 'hero' => $hero]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $hero = Superhero::find($id);
        if(empty($hero)){
            return back()
                ->withErrors(['msg' => "Запись id: {$id} не найдена!"])
                ->withInput();
        }
        return view('editor.pages.edit', [ 'hero' => $hero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'nickname' => 'required',
            'real_name' => 'required',
            'original_description' => 'required',
            'superpower' => 'required',
            'catch_phrase' => 'required',
        ];
        $this->validate($request, $rules);

        $hero = Superhero::find($id);

        if(empty($hero)){
            return back()
                ->withErrors(['msg' => "Такой id: {$id} не найден!"])
                ->withInput();
        }

        $data = $request->all();

        $result = $hero
            ->fill($data)
            ->save();
        if($request->images) {

            $images = [];

            foreach ($request->images as $item)
            {
                //$path = $request->file('images')->store('uploads' , 'public');
                $path = $item->store('uploads' , 'public');
                $str_path = substr($path, 8);
                $images[] = new HeroesPhoto( [
                    'hero_id' => $id,
                    'images' => $str_path
                ]);
            }
            $hero->photos()->saveMany($images);
        }
//
        if($result){
            return redirect()
                ->route('editor-hero.show', ['hero' => $hero->id])
                ->with(['success' => 'Успешно сохранено!']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Superhero::find($id);

        if(empty($hero)){
            return back()
                ->withErrors(['message' => "Такой id: {$id} не найден!"])
                ->withInput();
        }
        foreach ($hero->photos as $item)
        {
            $item->delete();
        }
        $hero->delete();
        return redirect()->route('home');
    }
}
