@extends('master')
@section('body')
<div class="wrapper">
    <section class="chat-area">
      <header>
        
        <a href="{{url('back-to-user')}}" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="{{url("$user2->image")}}" alt="">
        <div class="details">
          <span>{{$user2->first_name.' '.$user2->last_name}}</span>
          <p>
            {{$user2->status}}
          <?php
                        if($user2->status === 'Active Now'){
                            echo "*";
                        }
                        else{
                            echo "x";
                        }
                    ?>
          </p>
        </div>
      </header>

      <div class="chat-box">
        
      </div>
      <form action="{{url('insert-msg')}}" method="POST" class="typing-area">
        {{csrf_field()}}
        <input type="text" class="incoming_id" name="incoming_id" value="{{$user2->unique_id}}" hidden>
        <input type="text" class="outgoing_id" name="outgoing_id" value="{{$user1->unique_id}}" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <input type="submit" name="btn" class="btn btn-primary" style="width: 20%" value="Send">
        
        <!-- <button type="submit"><i class="fab fa-telegram-plane"></i></button> -->
      </form>
    </section>
  </div>
@endsection