<!DOCTYPE html>
<!-- app/resources/views/user/create.blade.php -->

@extends('layouts/layout')

<html lang="en">
    <!-- Create User Form... -->

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Create New User</h3>
                </div>
                <div class="panel-body">
                    <!-- if there are creation errors, they will show here -->
                    {!! Html::ul($errors->all()) !!}


                    {!! Form::model(new App\Models\User\User, ['route' => ['user.store']]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', Request::old('name'), array('class' => 'form-control', 'required')) !!}
                    </div><br>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', Request::old('email'), array('class' => 'form-control', 'required')) !!}
                    </div><br>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::text('password', Request::old('password'), array('class' => 'form-control', 'required')) !!}
                    </div><br>

                    <a href="{!!URL::route('user.login')!!}" class="btn btn-info" role="button">Cancel</a>
                    {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
 </html>