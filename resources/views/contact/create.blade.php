<!DOCTYPE html>
<!-- app/resources/views/contact/create.blade.php -->

@extends('layouts/layout')

<html lang="en">
<!-- Create User Form... -->

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Create New Contact</h3>
            </div>
            <div class="panel-body">
                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}


                {!! Form::model(new App\Models\Contact\Contact, ['route' => ['contact.store']]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', Request::old('name'), array('class' => 'form-control', 'required')) !!}
                </div><br>

                <div class="form-group">
                    {!! Form::label('surname', 'Surname') !!}
                    {!! Form::text('surname', Request::old('surname'), array('class' => 'form-control', 'required')) !!}
                </div><br>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', Request::old('email'), array('class' => 'form-control', 'required')) !!}
                </div><br>

                <div class="form-group">
                    {!! Form::label('contact_no', 'Contact no') !!}
                    {!! Form::text('contact_no', Request::old('contact_no'), array('class' => 'form-control', 'required')) !!}
                </div><br>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-md-4">
                            {{ Form::hidden('user_id', $user_id) }}
                        </div>
                    </div>
                </div>

                <a href="{!!URL::route('contacts')!!}" class="btn btn-info" role="button">Cancel</a>
                {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}


                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</html>