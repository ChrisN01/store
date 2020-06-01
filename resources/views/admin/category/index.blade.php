@extends('template.admin')
@section('title', 'Administración de Categorías')
@section('content')

<!-- /.row -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Sección de Categorías</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        
        <td><a class="m-2 float-right btn btn-success" href="{{ route ('admin.category.create')}}">Nueva Categoría</a> </td>
       
        <table class="table table-head-fixed">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Slug</th>
              <th>Fecha de creación</th>
              <th>Fecha de modificación</th>
              <th colspan="3"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $cat)
              <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->description}}</td>
                <td>{{$cat->slug}}</td>
                <td>{{$cat->created_at}}</td>
                <td>{{$cat->updated_at}}</td>
                <td><a class="btn btn-default" href="{{ route ('admin.category.show', $cat->slug)}}"><i class="fas fa-eye"></i> Ver</a></td>
                <td><a class="btn btn-info" href="{{ route ('admin.category.edit', $cat->slug)}}"><i class="fas fa-edit"></i> Editar</a> </td>
                <td><a class="btn btn-danger" href="{{ route ('admin.category.show', $cat->slug)}}"><i class="fas fa-trash"></i> Eliminar</a> </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
        {{$categories->links()}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<!-- /.row -->


@endsection