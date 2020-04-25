<div class="table-responsive-sm">
    <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA CURSOS</h1>
    <div class="row mg-b-10">
        <div class="col-md-6 col-12">
            <input wire:model="searchInput" type="text" placeholder="Buscar por Nombre de Curso..."
                class="form-control" />
        </div>
        <div class="col-md-6 col-12">
            <a href="{{route('curso.create')}}" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                Nuevo Curso</a>
        </div>
    </div>
    @if($cursos->total() > 0)
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">CURSO</th>
                <th scope="col">USUARIO</th>
                <th scope="col">REGISTRADO</th>
                <th scope="col">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{$curso->ncurso->nombre_curso}}</td>
                <td>{{$curso->user->nombres.' '.$curso->user->apellidos}}</td>
                <td><?= date('d-m-Y', strtotime($curso->created_at)) ?></td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('curso.edit',$curso->id)}}" <i class="fas fa-edit tx-info tx-20 mg-r-5"></i>
                        </a>

                        <button class="btn-delete"
                            onclick="confirmCurso({{$curso->id}},'{{$curso->ncurso->nombre_curso}}')">
                            <i class="fas fa-trash-alt tx-danger tx-20 mg-r-5"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $cursos->links() !!}
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
function confirmCurso(id,curso)
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
        'message': 'Desea eliminar el registro: ' + curso +'?',
        'callback': myCallback
    })
    }
</script>
@endpush