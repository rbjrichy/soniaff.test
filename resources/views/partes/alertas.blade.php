@if (Session::has('msj-danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
        {{ session()->pull('msj-danger') }} 
    </div>    
@endif
@if (Session::has('msj-info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Información!</h5>
        {{ session()->pull('msj-info') }} 
    </div>
@endif
@if (Session::has('msj-warning'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Advertencia!</h5>
        {{ session()->pull('msj-waring') }} 
    </div>
@endif
@if (Session::has('msj-success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Exito!</h5>
        {{ session()->pull('msj-success') }} 
    </div>
@endif
