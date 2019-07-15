<!DOCTYPE html>
<!-- app/resources/views/user/login.blade.php -->

@extends('layouts/layout')

<html lang="en">

<div>{{{ $errors->first('email') }}}</div>

    <div class="row centered-form faded">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Login</h3>
                </div>
                <div class="panel-body">
                    {!! Form::model(['method' => 'GET', 'route' => ['contacts']]) !!}

                    <div class="form-group">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        {!! Form::text('email', '', array('class' => 'form-control input-sm', 'placeholder' => 'Email Address')) !!}
                    </div><br>

                    <div class="form-group">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        {!! Form::password('password', array('class' => 'form-control input-sm', 'placeholder' => 'Password')) !!}
                    </div><br>

                    {!! Form::submit('Login', array('class' => 'btn btn-info btn-block')) !!}
                    <a href="{!!URL::route('user.create')!!}" class="btn btn-info" role="button">Register</a>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</html>



