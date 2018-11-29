@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.topics.title')</h3>

  

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">

            <div class="row">

         
             



             @if (count($topics) > 0)
                        @foreach ($topics as $topic)
                            


                          <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                              <img src="https://i2.wp.com/www.felight.com/wp-content/uploads/2016/12/Quantitative-Aptitude_at_felight.png" alt="...">
                              <div class="caption">
                                <h2 style="min-height: 51px;">


                               

                                <a href="{{ route('tests.index',[$topic->id]) }}" class="btn btn-xs btn-primary"> {{ $topic->title }}</a>


                                </h2>
                                
                           
                                   
                            </div>
                            </div>
                          </div>
                        @endforeach
                    @else
                        <div>
                           @lang('quickadmin.no_entries_in_table')<
                        </div>
                    @endif





            </div>






        </div>
    </div>
@stop

@section('javascript')
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('topics.mass_destroy') }}';
    </script>
@endsection