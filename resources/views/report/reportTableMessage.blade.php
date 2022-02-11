<h1>Reporte de Mensajes</h1>
<table class="table table-striped table-hover">
    <thead class="thead-dark bg-primary">
    <tr>
        <th>Id</th>
        <th>Enviado por</th>
        <th>descripion</th>
        <th>Demandante</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reportMessage as $report)

        @if($report->accepted === null)
            <tr>
        @elseif($report->accepted)
            <tr class="table-danger">
        @else
            <tr class="table-primary">
                @endif
            <td>{{$report->id}}</td>
            <td>{{$report->message->userTransmitter->name}}</td>
            <td>{{$report->description}}</td>
            <td>{{$report->message->article->user->name}}</td>

            <td>
                <a href="{{route('message.show',$report->message)}}"><i class="bi bi-eye"></i></a>
                <a href="{{route('reportMessage.rejected',$report)}}"><i class="bi bi-hand-thumbs-down"></i></a>
                <a href="{{route('reportMessage.accepted',$report)}}"><i class="bi bi-hand-thumbs-up"></i></a>
                <form id="deleteUser" action="{{ route('reportMessage.destroy', $report) }}" method="POST" class="d-inline-block">
                    @method('DELETE')
                    @csrf
                    <button  class="bi bi-trash" aria-hidden="true"></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
