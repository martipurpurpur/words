@extends('layouts.main')

@section('title', 'Function Reference')

@section('content')


    @foreach ($references as $reference)
       <div class="container">
           <div class="row">
               <div class="col">
                  <dl class="border border-info rounded p-2">
                   <dt class="font-weight-bold ">{{ $reference->termin }}</dt>
                   <dd>{{ $reference->definition }}</dd>
                  </dl>
               </div>
               <div class="col">{{$reference->signature}}</div>
               <div class="col-sm-2">
                   <button type="button" class="badge badge-pill"
                           data-toggle="modal" data-target="#myModal-{{ $reference->id }}">
                       Example
                   </button>
               </div>
           </div>
       </div>

       <!-- Modal -->
       <div class="modal fade" id="myModal-{{ $reference->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">{{$reference->eng}}</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <code>{{$reference->example}}</code>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
       </div>
    @endforeach


@endsection
