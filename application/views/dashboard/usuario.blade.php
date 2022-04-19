{{-- Extensão do template principal --}}
@extends('templates.app')
{{-- Conteudo principal --}}
@section('conteudo-principal')
    @include('forms.form-user')
@endsection