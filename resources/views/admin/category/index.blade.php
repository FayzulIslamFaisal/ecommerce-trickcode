@extends('admin.layout.master')

@section('admin_content')
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th>Category Name</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)


                <tr>
                    <td> {{ $category->name }}</td>
                    <td class="center">{!! $category->description !!}</td>
                    <td class="center">
                        <img style="height:100px" class="img-fluid" src="{{ asset('category/'.$category->image) }}" alt="">
                    </td>
                    <td class="center">

                            @if ($category->status=='1')
                            <span class="label label-success"> {{ 'Active' }} </span>
                            @else
                            <span class="label label-danger">
                                {{ 'Deactive' }}
                            </span>
                            @endif

                    </td>
                    <td class="center">

                            @if ($category->status=='1')
                            <a class="btn btn-success" href="{{ route('cat-status',$category->id) }}">
                                <i class="halflings-icon white thumbs-down"></i>
                            </a>
                            @else
                            <a class="btn btn-success" href="{{ route('cat-status',$category->id) }}">
                                <i class="halflings-icon white thumbs-up"></i>
                            </a>
                            @endif

                        <a class="btn btn-info" href="#">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <a class="btn btn-danger" href="#">
                            <i class="halflings-icon white trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach


              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
