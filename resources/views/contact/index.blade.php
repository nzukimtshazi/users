<!DOCTYPE html>
<!-- app/resources/views/contact/index.blade.php -->

@extends('layouts/layout')

<html lang="en">

<!-- Current Users -->

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-6">
                <h4>Contacts</h4>
            </div>
            <div class="col-xs-6 text-right">
                <a href="contact/create" role="button" class="btn btn-default">Add Contact</a>
            </div>
        </div>
    </div>

    <div class="panel-body">
        <table class="table table-striped" id="dataTable">
        @if (count($contacts) > 0)

            <!-- Table Headings -->
                <thead>
                <th width="15%">Name</th>
                <th width="15%">Surname</th>
                <th width="25%">Email</th>
                <th width="15%">Contact No</th>
                <th width="*">Action</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <!-- User Name -->
                        <td class="table-text">
                            <div>{{ $contact->name }}</div>
                        </td>

                        <!-- User Surname -->
                        <td class="table-text">
                            <div>{{ $contact->surname }}</div>
                        </td>

                        <!-- User Email -->
                        <td class="table-text">
                            <div>{{ $contact->email }}</div>
                        </td>
                        <!-- Contact No -->
                        <td class="table-text">
                            <div>{{ $contact->contact_no }}</div>
                        </td>

                        <td>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-2">
                                    {!! Form::model($contact, ['method' => 'GET', 'route' => ['contact.edit', $contact->id]]) !!}
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fa fa-trash"></i> Edit
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-1">
                                    {!! Form::model($contact, ['method' => 'patch', 'route' => ['contact.delete', $contact->id]]) !!}
                                    <button type="submit" class="btn  btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="col-sm-4 col-md-4">
                            {{ Form::hidden('user_id', $user_id) }}
                        </div>
                    </div>
                </div>
                </tbody>
            @else
                <div class="alert alert-info" role="alert">No contacts are available</div>
            @endif
        </table>
    </div>
</div>
</html>