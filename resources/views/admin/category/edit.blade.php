@extends('template.admin')
@section('title', 'Editar Categoría')
@section('content')
<div id="apicategory">
  <form action="{{ route('admin.category.update', $cat->id) }}" method="POST">
    @csrf
    @method('PUT')
<span style="display:none;" id="edit">{{$edit}}</span>
<span style="display:none;" id="temp_name"> {{$cat->name}}</span>
  <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Administración de Categoría</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
          <h1>Editar Categoría</h1>
          <div class="form-group">
            <label for="name">Nombre</label>
            <input v-model="name"  

              @blur="getCategory"
              @focus ="div_show= false"
            
            class="form-control" type="text" name="name" id="name">
            <label for="slug">Slug</label>
            <input readonly v-model="generateSlug" class="form-control" type="text" name="slug" id="slug">
            <div v-if="div_show" v-bind:class="div_class_slug">
              @{{div_messageslug}}
              
            </div>
            <br v-if="div_show">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="5"> {{ $cat->description}}</textarea>
          </div>
        
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <input
      :disabled="disable_button==1"

      type="submit" value="Guardar" class="btn btn-primary float-right">
      <!-- /.card-footer-->
    </div>
  </div>
    <!-- /.card -->
  </form>
</div>


@endsection