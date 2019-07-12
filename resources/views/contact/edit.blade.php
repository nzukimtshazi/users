<!DOCTYPE html>
<!-- app/views/user/edit.blade.php -->

@extends('layouts/layout')

<html lang="en">
<!-- Edit User Form... -->

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Update User {!! $contact->name !!}</h3>
            </div>
            <div class="panel-body">
                <!-- if there are creation errors, they will show here -->
                {!! Html::ul($errors->all()) !!}

                {!! Form::model($contact, ['method' => 'PATCH', 'route' => ['contact.update', $contact->id]]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $contact->name, array('class' => 'form-control', 'required')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('surname', 'Surname') !!}
                    {!! Form::text('surname', $contact->surname, array('class' => 'form-control', 'required')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', $contact->email, array('class' => 'form-control', 'required')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('contact_no', 'Contact no') !!}
                    {!! Form::text('contact_no', $contact->contact_no, array('class' => 'form-control', 'required')) !!}
                </div>

                <a href="{!!URL::route('contact.create')!!}" class="btn btn-info" role="button">Cancel</a>
                {!! Form::submit('Update', array('class' => 'btn btn-primary')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</html>