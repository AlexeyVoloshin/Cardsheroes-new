@extends('editor.editor-index')

@section('title', 'create')

@section('content')
      <div class="col-md-7 ">
          {!! Form::open(array('url' => route('editor-hero.store'), 'method' => 'POST', 'enctype' =>"multipart/form-data")) !!}
          {{--{!! Form::open(['route' => 'editor-hero.store', 'enctype' =>"multipart/form-data"]) !!}--}}
          <form>
                      {{ csrf_field() }}
                      <div class="form-group">
                          <div class="col-form-label col-md-4">
                              {{Form::label('nickname', 'Псевдоним')}}
                          </div>
                          <div class="col-md-7">
                              {{Form::text('nickname', null, ['class' => 'form-control'])}}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-4 col-form-label ">
                              {{Form::label('real_name', 'Настоящее имя')}}
                          </div>
                          <div class="col-md-7">
                              {{Form::text('real_name', null, ['class' => 'form-control'])}}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class=" col-md-4 col-form-label ">
                              {{Form::label('original_description', 'Описание')}}
                          </div>

                          <div class="col-md-7 ">
                              {{Form::textarea('original_description', null, ['class' => 'form-control','rows'=>'3'])}}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class=" col-md-4 col-form-label">
                              {{Form::label('superpower', 'Супер сила')}}
                          </div>
                          <div class="col-md-7 ">
                              {{Form::textarea('superpower', null, ['class' => 'form-control','rows'=>'3'])}}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-4 col-form-label">
                              {{Form::label('catch_phrase', 'Коронная фраза')}}
                          </div>
                          <div class="col-md-7" >
                              {{Form::textarea('catch_phrase', null, ['class' => 'form-control','rows'=>'3'])}}
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-4">
                              {{Form::label('images', 'Выберите фото героя')}}
                          </div>
                          <div class="col-md-7">
                              {{Form::file('images[]',['multiple'])}}
                          </div>
                      </div>
                      <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        {{Form::submit('Создать', ['class' => 'btn btn-primary'])}}
                    </div>
              </div>
          </form>
          {!! Form::close() !!}
      </div>
@endsection