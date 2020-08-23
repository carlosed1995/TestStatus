
<form method="PATCH" action="{{ route('users.update', $id) }}" id="form-{{$id}}" class='ajax'>
    @csrf
    <input type="hidden" name="user_id" value="{{$id}}">
    <input type="hidden" name="is_active" value="{{$active}}">
    @if($active === 0)
    <button href="#" id="{{$id}}" type="submit" class="btn btn-{{ ($active == 0) ? 'success' : 'danger' }} btn-sm is-active">Activar</button>
    @else
    <button href="{{ route('users.destroy', $id) }}" type="submit" id="{{$id}}" class="btn btn-{{ ($active == 0) ? 'success' : 'danger' }} btn-sm is-active">Desactivar</button>
    @endif
</form>
 
 