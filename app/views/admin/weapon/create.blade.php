@extends('admin.layout')

@section('subtitle')
Create Weapon
@stop

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1>Weapon <small>New</small></h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="{{ route('adminDashboard') }}">
                    Dashboard
                </a>
            </li>
            <li>
                <i class="icon-file-alt"></i>
                <a href="{{ route('admin.game.index') }}">
                    Games
                </a>
            </li>
            <li>
                <i class="icon-file-alt"></i>
                <a href="{{ action('GameController@show', array('id' => $game -> id)) }}">
                    {{ $game -> id }}
                </a>
            </li>
            <li class="active">
                <i class="icon-file-alt"></i> Create Weapon
            </li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="well">
            {{ Form::open( array('action' => array('WeaponController@store', $game -> id), 'class' => 'form-horizontal', 'files' => true)) }}
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-6">
                        {{ Form::label('name', 'Weapon Name:', array('class' => 'control-label')) }}
                        {{ Form::text('name', '', array('class' => 'form-control input-lg', 'placeholder' => 'Name', 'required' => '')) }}
                    </div>
                    <div class="col-lg-2">
                        {{ Form::label('type', 'Weapon Type:', array('class' => 'control-label')) }}
                        {{ Form::text('type', '', array('class' => 'form-control input-lg', 'placeholder' => 'Type', 'required' => '')) }}
                    </div>
                    <div class="col-lg-2">
                        {{ Form::label('min_attachments', 'Min Attachments:', array('class' => 'control-label')) }}
                        {{ Form::text('min_attachments', '', array('class' => 'form-control input-lg', 'placeholder' => 'Min', 'required' => '')) }}
                    </div>
                    <div class="col-lg-2">
                        {{ Form::label('max_attachments', 'Max Attachments:', array('class' => 'control-label')) }}
                        {{ Form::text('max_attachments', '', array('class' => 'form-control input-lg', 'placeholder' => 'Max', 'required' => '')) }}
                    </div>
                </div>
                <div class="form-group">
                    @foreach($attachmentsBySlot as $key => $slot)
                    <div class="col-lg-2">
                        <div>
                            {{ Form::label('', 'Slot ' . $key, array('class' => 'control-label')) }}
                        </div>
                        <div class="btn-group-vertical" data-toggle="buttons">
                            @foreach($slot as $attachment)
                            <label class="btn btn-primary">
                                <input type="checkbox" value="{{ $attachment -> id }}" name="attachments[]">
                                {{ $attachment -> name }} </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
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
</div><!-- /.row -->

@stop
@section('page-scripts')
<script type="text/javascript">
    $('input[name=image]').change(function() {
        var name = $('input[name=image]').val().replace(/C:\\fakepath\\/i, '').replace(/.png|.jpg|.gif|.jpeg/, '');
        $('input[name=name]').val(name);
    }); 
</script>
@stop
