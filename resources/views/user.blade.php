@extends('master')
@section('body')

<div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
         
          <img src="{{url("$userInfo->image")}}" alt="">
          <div class="details">
            <span>{{$userInfo->first_name.' '.$userInfo->last_name}}</span>
            <p>{{$userInfo->status}}</p>
          </div>
        </div>
        <a href="" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
            <?php $i=0; ?>
            @foreach($allUsers as $all)
            
            <?php
                
            ?>
            <a href="{{url('/chat-duet/'.$all->unique_id)}}" style="text-decoration: none">
                <div class="content">
                <img src="{{url("$all->image")}}" alt="">
                <div class="details">
                    <span>{{$all->first_name.' '.$all->last_name}}</span>
                    <p></p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><?php
                        if($all->status === 'Active Now'){
                            echo "*";
                        }
                        else{
                            echo "x";
                        }
                    ?></div>
            </a>
            @endforeach
      </div>
    </section>
  </div>

@endsection