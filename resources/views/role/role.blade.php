@extends('layouts.adminmaster')

@section('maincontent')
@if(Session::has('role-del-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> a role Delete successfully</div>
            </div>
@endif
@if(Session::has('role-upadte-msg'))
 <div class="alert alert-danger"><b>Well Done!</b> role update successfully</div>
            </div>
@endif
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> All Role</h4>
                <hr>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Type</th>
                        <th class="hidden-phone">Role Code</th>
                        <th><i class=" fa fa-edit"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRole as $roleValue)
                    <tr>
                        <td>
                            <a href="basic_table.html#">{{$roleValue->id}}</a>
                        </td>
                        <td>
                            <p>{{$roleValue->role}}</p>
                        </td>
                        <td>
                            <p>{{$roleValue->status_code}}</p>
                        </td>
                        <td>
                            <a href="{{url('editrole')}}/{{$roleValue->id}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            
                            <a href="{{url('deleterole')}}/{{$roleValue->id}}"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>
@endsection