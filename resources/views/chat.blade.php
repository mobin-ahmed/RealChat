@extends('master')
@section('body')
<div class="wrapper">
    <!-- <p id="smsg"></p> -->
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

      <div class="chat-box areaChat">
      
        @foreach($allMsg as $am)
        <!-- <p>{{$am->message}}</p> -->
        @if($am->outgoing_id === $user1->unique_id )
      <div class="chat outgoing">
          <div class="details">
              <p>{{$am->message}}</p>
          </div>
        </div>
        @elseif($am->incoming_id === $user2->unique_id )
        <div class="chat incoming">
          <div class="details">
              <p>{{$am->message}}</p>
          </div>
        </div>
        @endif
        @endforeach
      </div>

      <form action="{{url('/in-msg')}}" method="POST"  class="typing-area">
        {{csrf_field()}}
        <input type="text" class="incoming_id" name="incoming_id" value="{{$user2->unique_id}}" hidden>
        <input type="text" class="outgoing_id" name="outgoing_id" value="{{$user1->unique_id}}" hidden>
        <input type="text" name="message" class="msg input-field" placeholder="Type a message here..." autocomplete="off">
        <input type="submit" name="btn" class="btn btn-primary add_msg" style="width: 20%" value="Send">        
        <!-- <button type="submit"><i class="fab fa-telegram-plane"></i></button> -->
      </form>




      <!-- <div>
      <input type="text" class="inid" name="incoming_id" value="{{$user2->unique_id}}" hidden>
        <input type="text" class="outgoing_id outid" name="outgoing_id" value="{{$user1->unique_id}}" hidden>
        <input type="text" name="message" class="msg input-field" placeholder="Type a message here..." autocomplete="off">
        <input type="submit" id="add_msg" style="width: 20%" value="Send">
      </div> -->
    </section>
  </div>
@endsection


<!-- @section('scripts')
    
  <script>
    $(document).ready(function(){

      fetchData();

      function fetchData(){
        $.ajax({
          type: "GET",
          url: "/fetch-msg",
          dataType: "json",
          success: function(response){
              // console.log(response.msgData);
              $each(response.msgData, function(key, item){
                $('areaChat').append('
                  <div>\
                    <p>'+msgData.message+'</p>\
                  </div>\
                ');
              });
          }
        }); 
      }


      $(document).on('click', '#add_msg', function(e){
        e.preventDefault();
        // console.log('hello');
        var data = {
          'inid': $('.inid').val(),
          'outid': $('.outid').val(),
          'msg': $('.msg').val(),
        }

        // console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
          type: "POST",
          url: "/set-data",
          data: data,
          dataType: "json",
          success: function(response){
            // console.log(response);
            $('#smsg').text(reponse.msg);
            fetchData();
          }
        });
      });
    });
  </script>
@endsection -->