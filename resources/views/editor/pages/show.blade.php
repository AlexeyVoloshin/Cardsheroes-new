
@extends('editor.editor-index')

@section('title', 'show')

@section('content')
        @isset($hero)
            <div class="card border-primary col-md-10 "   >
                <div class="card-body">
                        <img  src="{{$hero->photo->images != '' ? asset('storage/uploads/' . $hero->photo->images) : asset('storage/img/question.png') }}" class="card-img-top col-md-5 float-left " style="padding-right: 15px " >
                        <h5 class="card-title" >Псевдоним: {{$hero->nickname}}</h5>
                        <h6 class="card-title">Имя: {{$hero->real_name}}</h6>
                        <p class="card-text">Описание: {{$hero->original_description}}</p>
                        <p class="card-text">Суперсила: {{$hero->superpower}}</p>
                        <p class="card-text">Коронная фраза: {{$hero->catch_phrase}}</p>
                </div>
                <div class="card-bottom" style="display: flex;
                                                justify-content: flex-end;
                                                padding-top: 10px;
                                                padding-bottom: 10px;" >
                    <a href="{{URL::to('editor-hero/'. $hero->id). '/edit'}}" style="float: left; margin-right: 5px" class="btn btn-outline-info btn-inf">Изменить</a>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['editor-hero.destroy', $hero->id]]) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger'] ) !!}
                    {!! Form::close() !!}
                </div>
            </div>
                <div class="card-body">
                    <div class="row border-primary ">
                        @foreach($hero->photos as $item)
                            <img src="{{asset('storage/uploads/' . $item['images'])}}" style="display: flex; ">
                        @endforeach
                    </div>
                </div>
        @endisset
@endsection

