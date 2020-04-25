<div class="table-responsive-sm">
    <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA CURSOS ASIGANOS</h1>
    <div class="row mg-b-10">
        <div class="col-md-6 col-12">
            <input wire:model="searchInput" type="text" placeholder="Buscar por Nombre de Curso..."
                class="form-control" />
        </div>
        <div class="col-md-6 col-12">
            <a href="{{route('ncurso.create')}}" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                Asignar Curso</a>
        </div>
    </div>
    @if($ncursos->total() > 0)
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CURSO</th>
                <th scope="col">CICLO</th>
                <th scope="col">PROGRAMA</th>
                <th scope="col">REGISTRADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ncursos as $ncurso)
            <tr>
                <td>{{ $ncurso->nombre_curso }}</td>
                <td>{{ $ncurso->ciclo->nro_ciclo }}</td>
                <td>{{ $ncurso->programa->nombre_programa }}</td>
                <td>{{ date('d-m-Y', strtotime($ncurso->created_at)) }}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('ncurso.edit',$ncurso->id)}}" <i class="fas fa-edit tx-info tx-20 mg-r-5"></i>
                        </a>

                        <button class="btn-delete" onclick="confirmNcurso({{$ncurso->id}},'{{$ncurso->nombre_curso}}')">
                            <i class="fas fa-trash-alt tx-danger tx-20 mg-r-5"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ncursos->links() !!}
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
function confirmNcurso(id,ncurso)
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
        'message': 'Desea eliminar el registro: ' + ncurso +'?',
        'callback': myCallback
    })
    }
</script>
@endpush