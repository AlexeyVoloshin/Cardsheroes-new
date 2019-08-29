@extends('editor.editor-index')

@section('title', 'create')

@section('content')

          {!! Form::model($hero, array('route' => array('editor-hero.update', $hero->id), 'method' => 'PUT', 'enctype' =>"multipart/form-data")) !!}
          <form>
          {{ csrf_field() }}
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="form-group">
                          <div class="col-form-label col-md-4">
                              {{Form::label('nickname', 'Псевдоним')}}
                          </div>
                          <div class="col-md-9">
                              {{Form::text('nickname', null, ['class' => 'form-control'])}}
                          </div>
                          </div>

                          <div class="form-group">
                              <div class="col-md-7 col-form-label ">
                                  {{Form::label('real_name', 'Настоящее имя')}}
                              </div>
                              <div class="col-md-9">
                                  {{Form::text('real_name', null, ['class' => 'form-control'])}}
                              </div>
                          </div>

                          <div class="form-group">
                              <div class=" col-md-7 col-form-label ">
                                  {{Form::label('original_description', 'Описание')}}
                              </div>

                              <div class="col-md-9 ">
                                  {{Form::textarea('original_description', null, ['class' => 'form-control','rows'=>'3'])}}
                              </div>
                          </div>

                          <div class="form-group">
                              <div class=" col-md-7 col-form-label">
                                  {{Form::label('superpower', 'Супер сила')}}
                              </div>
                              <div class="col-md-9 ">
                                  {{Form::textarea('superpower', null, ['class' => 'form-control','rows'=>'3'])}}
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-7 col-form-label">
                                  {{Form::label('catch_phrase', 'Коронная фраза')}}
                              </div>
                              <div class="col-md-9" >
                                  {{Form::textarea('catch_phrase', null, ['class' => 'form-control','rows'=>'3'])}}
                                  {{old('catch_phrase', $hero->catch_phrase )}}
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-7">
                                  {{Form::label('images', 'Выберите фото героя')}}
                              </div>
                              <div class="col-md-9">
                                  {{Form::file('images[]',['multiple'])}}
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-9 col-md-offset-3">
                                  {{Form::submit('Создать', ['class' => 'btn btn-primary'])}}
                              </div>
                          </div>
                  </div>
              </div>
          </form>
          {!! Form::close() !!}
@endsection