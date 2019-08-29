@extends('editor.editor-index')

@section('title', 'Home')

@section('content')
    <section class="container">
        <div class="row justify-content-center " >
            @foreach($hero as $item)
                    <div class="card border-primary mb-3 " style="width: 18rem; margin-right: 5px">
                        <img class="card-img-top" style="height: 420px" src="{{\App\Models\Superhero::find($item['id'])->photo['images'] != '' ? asset('storage/uploads/' . \App\Models\Superhero::find($item['id'])->photo['images']): asset('storage/img/question.png')}} ">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nickname }}</h5>
                            <a href="{{URL::to('editor-hero/'. $item->id)}}" class="btn btn-outline-info btn-inf">Узнать больше</a>
                        </div>
                    </div>
            @endforeach
        </div>
        {{ $hero->links() }}
    </section>

@endsection