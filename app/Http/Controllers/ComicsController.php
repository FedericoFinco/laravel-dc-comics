<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class comicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view("comics.index", compact("comics") );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    
    private function comicValidation($data){
        $validator= Validator::make($data,[
                "title"=>"required|min:5|max:50",
                "description" => "min:5|max:65535",
                "thumb" => "required|min:5|max:65535",
                "price" => "required|max:50",
                "title"=>"required|min:5|max:50",
                "sale_date"=>"required|date_format:Y-m-d",
                "type"=>"required|min:5|max:50",
            ],[
                "title.required" => "Il titolo è obbligatorio",
                "title.min" => "Il titolo deve essere almeno di :min caratteri",
                "description.min" => "la descrizione deve essere almeno di :min caratteri",
                "thumb.required" => "la thumb purtroppo è necessaria. smasha la mano sulla tastiera e va bene",
                "price.max" => "il prezzo è troppo lungo",
                "sale_date.date_format" => "il formato della data deve essere yyyy-mm-gg"
            ])->validate();

            return $validator;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     "title"=>"required|min:5|max:50",
        //     "description" => "min:5|max:65535",
        //     "thumb" => "required|min:5|max:65535",
        //     "price" => "required|max:50",
        //     "title"=>"required|min:5|max:50",
        //     "sale_date"=>"required|date_format:Y-m-d",
        //     "type"=>"required|min:5|max:50",
        // ]);
        // $data = $request->all();
        $data = $this->comicValidation( $request->all() );
        
        $newComic = new Comic;
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->save();
        
        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic") );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $types = Comic::select('type')->distinct()->get()->all();
        // dd($types);
        return view("comics.edit", compact("comic","types"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $comic->price = $data['price'];
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $comic->update();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic -> delete();

        return redirect()->route('comics.index');

    }
}
