@extends('twill::layouts.form')

@section('contentFields')
    @formField('input', [
    'name' => 'html',
    'type' => 'textarea',
    'label' => 'HTML for brick',
    'rows' => 20
    ])
@stop
