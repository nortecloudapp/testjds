<div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-solid-success">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span
                    aria-hidden="true">&times;</span></button>
            <strong>{{ session('message') }}</strong>
        </div>
        @endif
    </div>
    <div class="table-responsive-sm">
        <h1 class="bg-indigo tx-center tx-md-26 tx-white pd-t-10 pd-b-10">TABLA MATERIALES</h1>
        <div class="row mg-b-10">
            <div class="col-md-6 col-12">
                <input wire:model="searchInput" type="text" placeholder="Buscar por TAG..." class="form-control" />
            </div>
            <div class="col-md-6 col-12">
                @if(Auth::user()->hasRole('admin'))
                <a href="{{route('material.create')}}" class="btn btn-indigo btn-register"><i class="fas fa-plus"></i>
                    Nuevo Material</a>
                @endif
            </div>
        </div>
        @if($materiales->total() > 0)
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">CURSO</th>
                    <th scope="col">TAG</th>
                    <th scope="col">URL MATERIAL</th>
                    <th scope="col">REGISTRADO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materiales as $material)
                <tr>
                    <td>{{ $material->ncurso->nombre_curso }}</td>
                    <td>{{ $material->tag }}</td>
                    <td><a target="_blank" title="Link Material" href="{{ $material->url }}">{{ $material->url }}</a>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($material->created_at)) }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('material.edit',$material->id)}}" <i
                                class="fas fa-edit tx-info tx-20 mg-r-5"></i>
                            </a>
                            <button class="btn-delete"
                                onclick="confirmMaterial({{$material->id}},'{{$material->tag}}')">
                                <i class="fas fa-trash-alt tx-danger tx-20 mg-r-5"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $materiales->links() !!}
        @else
        <div class="alert alert-solid-danger mg-b-0 tx-center" role="alert">
            <strong>No existe el registro.</strong>
        </div>
        @endif
    </div>
</div>
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('iniciando push');
    });
    function confirmMaterial(id,tag)
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
            'message': 'Desea eliminar el registro: ' + tag +'?',
            'callback': myCallback
        })
        }
</script>
@endpush