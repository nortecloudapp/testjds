<div class="table-responsive-sm">
    <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA NOTAS</h1>
    <div class="row mg-b-10">
        <div class="col-md-6 col-12">
            <input wire:model="searchInput" type="text" placeholder="Buscar por Nombre de Programa..."
                class="form-control" />
        </div>
        <div class="col-md-6 col-12">
            <a href="{{route('nota.create')}}" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                Nueva Nota</a>
        </div>
    </div>
    @if($notas->total() > 0)
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CURSO</th>
                <th scope="col">USUARIO</th>
                <th scope="col">NOTA</th>
                <th scope="col">REGISTRADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
            <tr>
                <td>{{ $nota->ncurso->nombre_curso }}</td>
                <td>{{ $nota->user->nombres.' '.$nota->user->apellidos }}</td>
                <td>
                    @if($nota->nro_nota >= 11)
                    <strong class="badge badge-success text-wrap validarmulta">
                        Nota :{{$nota->nro_nota}}
                    </strong>
                    @else
                    <strong class="badge badge-danger text-wrap validarmulta">
                        Nota :{{$nota->nro_nota}}
                    </strong>
                    @endif
                </td>
                <td>{{ date('d-m-Y', strtotime($nota->created_at)) }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('nota.edit',$nota->id)}}" <i class="fas fa-edit tx-info tx-20 mg-r-5"></i>
                        </a>

                        <button class="btn-delete" onclick="confirmNota({{$nota->id}},'{{$nota->nro_nota}}')">
                            <i class="fas fa-trash-alt tx-danger tx-20 mg-r-5"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $notas->links() !!}
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
function confirmNota(id,nota)
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
        'message': 'Desea eliminar el registro: ' + nota +'?',
        'callback': myCallback
    })
    }
</script>
@endpush