@extends('admin.layout')

@section('subtitle')
Edit Weapon {{ $weapon -> name }}
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1>Weapon <small>Edit</small></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li>
                <i class="icon-file-alt"></i> Weapon
            </li>
            <li class="active">
                <i class="icon-file-alt"></i> Edit
            </li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-7">
        <div class="well">
            {{ Form::open( array('url' => action('WeaponController@update', array('id' => $game -> id, 'weaponID' => $weapon -> id)), 'class' => 'form-horizontal', 'files' => true)) }}
            <fieldset>
                <legend>
                    <h2>Edit Weapon</h2>
                </legend>
                <div class="form-group">
                    <div class="col-lg-12">
                        {{ Form::text('name', $weapon -> name, array('class' => 'form-control input-lg', 'placeholder' => 'Game Name', 'required' => '')) }}
                    </div>
                </div>
                @foreach($attachmentsBySlot as $key => $slot)
                <div class="col-lg-3">
                    <div>
                        {{ Form::label('', 'Slot ' . $key, array('class' => 'control-label')) }}
                    </div>
                    <div class="btn-group-vertical" data-toggle="buttons">
                        @foreach($slot as $attachment)
                        <label class="btn btn-primary {{ $attachment -> checked }}"> @if(!empty($attachment -> checked))
                            <input type="checkbox" value="{{ $attachment -> id }}" name="attachments[]" checked>
                            @else
                            <input type="checkbox" value="{{ $attachment -> id }}" name="attachments[]">
                            @endif
                            {{ $attachment -> name }} </label>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <div class="form-group">
                    <div class="col-lg-12">
                        {{ Form::label('image', 'Upload Image: ', array('class' => 'control-label'))}}
                        {{ Form::file('image', '', array('class' => 'form-control input-lg')) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop