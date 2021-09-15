@php
$configEditor = [
    "height" => "300",
    "toolbar" => [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]              
    ],
]
@endphp

{{-- $('#summernote').summernote('fontSizeUnit', 'pt');
$('#summernote').summernote('fontSize', 20); --}}

<div class="card card-primary card-outline">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-edit"></i>
        Informe de taller
      </h3>
    </div>
    <div class="card-body" style="font-size: 12px">
        <div class="row">
            <div class="col-5 col-sm-3">
              <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="vert-tabs-justificacion-tab" data-toggle="pill" href="#vert-tabs-justificacion" role="tab" aria-controls="vert-tabs-justificacion" aria-selected="true">Justificación</a>
                <a class="nav-link" id="vert-tabs-obj_general-tab" data-toggle="pill" href="#vert-tabs-obj_general" role="tab" aria-controls="vert-tabs-obj_general" aria-selected="false">Obj. General</a>
                <a class="nav-link" id="vert-tabs-objs_especificos-tab" data-toggle="pill" href="#vert-tabs-objs_especificos" role="tab" aria-controls="vert-tabs-objs_especificos" aria-selected="false">Objs. Especificos</a>
                <a class="nav-link" id="vert-tabs-contenido-tab" data-toggle="pill" href="#vert-tabs-contenido" role="tab" aria-controls="vert-tabs-contenido" aria-selected="false">Contenido</a>
                <a class="nav-link" id="vert-tabs-procedimiento-tab" data-toggle="pill" href="#vert-tabs-procedimiento" role="tab" aria-controls="vert-tabs-procedimiento" aria-selected="false">Procedimiento</a>
                <a class="nav-link" id="vert-tabs-resultados-tab" data-toggle="pill" href="#vert-tabs-resultados" role="tab" aria-controls="vert-tabs-resultados" aria-selected="false">Resultados</a>
                <a class="nav-link" id="vert-tabs-conclusiones-tab" data-toggle="pill" href="#vert-tabs-conclusiones" role="tab" aria-controls="vert-tabs-conclusiones" aria-selected="false">Conclusiones</a>
                <a class="nav-link" id="vert-tabs-recomendaciones-tab" data-toggle="pill" href="#vert-tabs-recomendaciones" role="tab" aria-controls="vert-tabs-recomendaciones" aria-selected="false">Recomendaciones</a>
              </div>
            </div>
            <div class="col-7 col-sm-9">
              <div class="tab-content" id="vert-tabs-tabContent">
                <div class="tab-pane text-left fade active show" id="vert-tabs-justificacion" role="tabpanel" aria-labelledby="vert-tabs-justificacion-tab">
                    <x-adminlte-text-editor name="justificacion" :config='$configEditor'>
                        {{ old('justificacion', $informe->justificacion ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-obj_general" role="tabpanel" aria-labelledby="vert-tabs-obj_general-tab">
                    <x-adminlte-text-editor name="objetivo_general" :config='$configEditor'>
                        {{ old('objetivo_general', $informe->objetivo_general ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-objs_especificos" role="tabpanel" aria-labelledby="vert-tabs-objs_especificos-tab">
                    <x-adminlte-text-editor name="objetivos_especificos" :config='$configEditor'>
                        {{ old('objetivos_especificos', $informe->objetivos_especificos ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-contenido" role="tabpanel" aria-labelledby="vert-tabs-contenido-tab">
                    <x-adminlte-text-editor name="contenido" :config='$configEditor'>
                        {{ old('contenido', $informe->contenido ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-procedimiento" role="tabpanel" aria-labelledby="vert-tabs-procedimiento-tab">
                    <x-adminlte-text-editor name="procedimiento" :config='$configEditor'>
                        {{ old('procedimiento', $informe->procedimiento ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-resultados" role="tabpanel" aria-labelledby="vert-tabs-resultados-tab">
                    <x-adminlte-text-editor name="resultados" :config='$configEditor'>
                        {{ old('resultados', $informe->resultados ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-conclusiones" role="tabpanel" aria-labelledby="vert-tabs-conclusiones-tab">
                    <x-adminlte-text-editor name="conclusiones" :config='$configEditor'>
                        {{ old('conclusiones', $informe->conclusiones ?? '') }}
                    </x-adminlte-text-editor>
                </div>
                <div class="tab-pane text-left fade" id="vert-tabs-recomendaciones" role="tabpanel" aria-labelledby="vert-tabs-recomendaciones-tab">
                    <x-adminlte-text-editor name="recomendaciones" :config='$configEditor'>
                        {{ old('recomendaciones', $informe->recomendaciones ?? '') }}
                    </x-adminlte-text-editor>
                </div>
              </div>
            </div>
          </div>
    </div>
    <!-- /.card -->
  </div>