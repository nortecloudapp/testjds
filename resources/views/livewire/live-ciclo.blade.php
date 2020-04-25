<div class="table-responsive-sm">
    <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA CICLOS</h1>
    <div class="row mg-b-10">
        <div class="col-md-6 col-12">
            <input wire:model="searchInput" type="text" placeholder="Buscar por Nro Ciclo..." class="form-control" />
        </div>
        <div class="col-md-6 col-12">
            <a href="{{route('ciclo.create')}}" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                Nuevo Ciclo</a>
        </div>
    </div>
    @if($ciclos->total() > 0)
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CICLO</th>
                <th scope="col">REGISTRADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ciclos as $ciclo)
            <tr>
                <td><?= $ciclo->nro_ciclo ?></td>
                <td><?= date('d-m-Y', strtotime($ciclo->created_at)) ?></td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('ciclo.edit',$ciclo->id)}}" <i class="fas fa-edit tx-info tx-20 mg-r-5"></i>
                        </a>

                        <button class="btn-delete" onclick="confirmCiclo({{$ciclo->id}},'{{$ciclo->nro_ciclo}}')">
                            <i class="fas fa-trash-alt tx-danger tx-20 mg-r-5"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ciclos->links() !!}
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