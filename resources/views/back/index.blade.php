@extends('back.layout') 

@section('content') 
  <div class="container-fluid">
      <div class="row">
        @if(@isset($posts))
          <x-back.box
            type='info'
            :number='$posts'
            title='New posts'
            route='posts.indexnew'
            model='post'>
          </x-back.box>
        @endif

        @if(@isset($users))
          <x-back.box
            type='success'
            :number='$users'
            title='New users'
            route='users.indexnew'
            model='user'>
          </x-back.box>
        @endif

        @if(@isset($contacts))
          <x-back.box
            type='primary'
            :number='$contacts'
            title='New contacts'
            route='contacts.indexnew'
            model='contact'>
          </x-back.box>
        @endif

        @if(@isset($comments))
          <x-back.box
            type='danger'
            :number='$comments'
            title='New comments'
            route='comments.indexnew'
            model='comment'>
          </x-back.box>
        @endif 
        
        @if(@isset($subscribers))
          <x-back.box
            type='warning'
            :number='$subscribers'
            title='New Subscribers'
            route='subscribers.indexnew'
            model='Newsletter'>
          </x-back.box>
        @endif 
      </div>      
  </div>
@endsection