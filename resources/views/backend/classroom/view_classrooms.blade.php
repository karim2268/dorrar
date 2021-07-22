@extends('admin.body.master')
@section('css')
@toastr_css
@section('title')
{{trans('Grades_trans.title_page')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('Grades_trans.title_page')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
        
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        
                            <button type="button" class="button x-small" onclick=" location.href='{{route('classrooms.add')}}'">
                                {{ trans('My_Classes_trans.add_class') }}
                            </button>
                            
                            <br><br>
        
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                       data-page-length="50"
                                       style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>{{ trans('My_Classes_trans.Name_class') }}</th>
                                        <th>{{ trans('My_Classes_trans.Name_Grade') }}</th>
                                        <th>{{ trans('My_Classes_trans.Processes') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($Classrooms as $Classroom)
                                        <tr>
                                            <?php $i++; ?>
                                            <td>{{ $i }}</td>
                                            <td>{{ $Classroom->Name_Class }}</td>
                                            <td>{{ $Classroom->Grades->Name }}</td>
                                            <td>
                                                
                                            <a href="{{route('grades.edit',$Classroom->id)}}" class="btn btn-info"  title="{{ trans('Grades_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></a>

                                            <a href="{{route('grades.delete',$Classroom->id)}}" class="btn btn-danger" id="delete" title="{{ trans('Grades_trans.Delete') }}"><i
                                            class="fa fa-trash"></i></a>
                                                       
                                               
                                            </td>
                                        </tr>
        
                                       
                                       
        
        
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
