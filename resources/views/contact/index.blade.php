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

                <a href="{!!URL::route('contact.create',['user_id' => $user_id])!!}" class="btn btn-warning">Add Contact</a>
                <button type="button" class="pull-right glyphicon glyphicon-tag" style="background-color: Transparent;border: none; " data-toggle="modal" data-target="#searchModal">Search</button>
                {{--<a href="{!!URL::route('contact.search')!!}" class="btn btn-default">Search</a>--}}
                <a href="{!!URL::route('user.login')!!}" class="btn btn-default">Back</a>
            </div>
        </div>

    <div class="panel-body">
        <table class="table table-striped" id="dataTable">

        @if (count($contacts) > 0)

            <!-- Table Headings -->
                <thead>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Contact No</th>
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
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <a href="{!!URL::route('contact.edit',[$contact->id, 'user_id' => $user_id])!!}" class="btn btn-warning">Edit</a>
                                    <a href="{!!URL::route('contact.delete',[$contact->id, 'user_id' => $user_id])!!}" class="fa fas_trash">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @else
                <div class="alert alert-info" role="alert">No contacts are available</div>
            @endif
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-4 col-md-4">
                        {{ Form::hidden('user_id', $user_id) }}
                    </div>
                </div>
            </div>
        </table>
    </div>
</div>
</html>
