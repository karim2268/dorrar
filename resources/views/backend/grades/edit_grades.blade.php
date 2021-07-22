@extends('admin.body.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    empty
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card card-statistics h-100">
            <div class="card-body">
                 <!-- add_form -->
                 <form action="{{route('grades.update',$editGrades->id)}}" method="post">
                    
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name_ar"
                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_ar') }}
                                :</label>
                            <input type="text" name="Name_ar"
                                class="form-control" value="{{ $editGrades->getTranslation('Name', 'ar') }}" >
                                
                                
                        </div>
                        <div class="col">
                            <label for="Name_en"
                                class="mr-sm-2">{{ trans('Grades_trans.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control"
                                
                                name="Name_en"  value="{{ $editGrades->getTranslation('Name', 'en') }}" >
                                
                        </div>
                    </div>
                    
                    <br><br>

                    <div class="text">
                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="{{ trans('Grades_trans.submit') }}">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')


@endsection
