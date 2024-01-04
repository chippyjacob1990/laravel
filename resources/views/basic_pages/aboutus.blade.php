@extends('layouts.layout')

@section('content')
   <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
      <h2> About Us </h2>
      <div>We are a small store which provides dress for women.</div><br>
         <section>
            <h5>Our CEO</h5>
            <div class="ceo-details">Our Company is owned and managed by {{ $name }}, who is a
               @isset($age)
               @if($age>30)     
               <span> Senior</span>
               @else 
               <span>Young</span>
               @endif
               @endisset
               <span>person. <br>She/he is </span>
               @switch($status)
                  @case(1)
                     <span>serving the company</span>
                     @break
                  @case(0)
                     <span>not serving</span>
                     @break
                  @default
                     <span>resigned</span>
                     @break    
               @endswitch

              {{-- 
               @for ($i = 1; $i < 5; $i++)
               {{ $i }}
               @endfor 
               --}}
               <div>
                  <span>Her hobbies are:-</span>
                  @foreach($hobbies as $hobby)
                  <span @if($loop->even and $loop->first) class="even first"
                  @elseif($loop->even and $loop->last) class="even last"
                  @elseif($loop->even) class="even"
                  @elseif($loop->odd and $loop->last) class="odd last"
                  @elseif($loop->odd and $loop->first) class="odd first"
                  @elseif($loop->odd) class="odd"
                  @endif>
                  {{-- $loop->index --}} {{ strtoupper($hobby) }}</span>
                  @endforeach
               </div>
            </div>
         </section>
      </div>
   </div>
@endsection