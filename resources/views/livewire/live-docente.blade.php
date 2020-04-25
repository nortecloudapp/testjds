<div class="table-responsive-sm">
    <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA DOCENTES</h1>
    <div class="row mg-b-10">
        <div class="col-md-6 col-12">
            <input wire:model="searchInput" type="text" placeholder="Buscar..." class="form-control" />
        </div>
        <div class="col-md-6 col-12">
            <a href="#" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                Pendiente</a>
        </div>
    </div>
    @if($docentes->total() > 0)
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">DATOS</th>
                <th scope="col">DNI</th>
                <th scope="col">REGISTRADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($docentes as $docente)
            <tr>
                <td>{{$docente->nombres.' '. $docente->apellidos}}</td>
                <td>{{$docente->email}}</td>
                <td>{{$docente->dni}}</td>
                <td>{{$docente->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $docentes->links() !!}
    @else
    <div class="alert alert-solid-danger mg-b-0 tx-center" role="alert">
        <strong>No existe el registro.</strong>
    </div>
    @endif
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('iniciando push');
    });
    function confirmCiclo(id,ciclo)
        {   
            var myCallback = function(choice){
            if(choice){
                @this.call('delete',id);
                notif({
                    'type': 'success',
                    'msg': 'Registro Eliminado',
                    'position': 'center'                        
                })
            }
        }

        notif_confirm({
            'textaccept': 'Eliminar',
            'textcancel': 'Cancelar',
            'message': 'Desea eliminar el registro: ' + ciclo +'?',
            'callback': myCallback
        })
        }
</script>
@endpush