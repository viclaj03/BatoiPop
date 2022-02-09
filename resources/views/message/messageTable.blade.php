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
                <td>{{$report->message->user->name}}</td>
                <td>{{$report->description}}</td>
                <td>{{$report->message->article->user->name}}</td>

                <td>
                    <a href="{{route('report.rejected',$report)}}"><i class="bi bi-hand-thumbs-down"></i></a>
                    <a href="{{route('report.accepted',$report)}}"><i class="bi bi-hand-thumbs-up"></i></a>
                    <a href=""><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
