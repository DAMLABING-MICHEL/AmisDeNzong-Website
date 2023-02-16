@extends('back.layout')

@section('content')
<div class="container-fluid">
  <div class="row">
    @if(@isset($posts) && @isset($newposts))
    <x-back.box type='posts-box' title='Total posts' :number='$posts' newtitle='New posts' :newnumber='$newposts'
      route='posts.indexnew' model='post'>
    </x-back.box>
    @endif

    @if(@isset($users) && @isset($newusers))
    <x-back.box type='users-box' :number='$users' title='Total users' newtitle='New users' :newnumber='$newposts'
      route='users.indexnew' model='user'>
    </x-back.box>
    @endif

    @if(@isset($contacts) && @isset($newcontacts))
    <x-back.box type='contacts-box' :number='$contacts' title='Total contacts' newtitle='New contacts'
      :newnumber='$newcontacts' route='contacts.indexnew' model='contact'>
    </x-back.box>
    @endif

    @if(@isset($comments) && @isset($newcomments))
    <x-back.box type='comments-box' :number='$comments' title='Totlal comments' newtitle='New comments'
      :newnumber='$newcomments' route='comments.indexnew' model='comment'>
    </x-back.box>
    @endif

    @if(@isset($subscribers) && @isset($newsubscribers))
    <x-back.box type='subscribers-box' :number='$subscribers' title='Total Subscribers' newtitle='New subscribers'
      :newnumber='$newsubscribers' route='subscribers.indexnew' model='Newsletter'>
    </x-back.box>
    @endif
    @if(@isset($stafs) && @isset($newstaff))
    <x-back.box type='staff-box' :number='$stafs' title='Total staff' newtitle='New staff' :newnumber='$newstaff'
      route='staff.indexnew' model='Staff'>
    </x-back.box>
    @endif
  </div>
</div>
@endsection