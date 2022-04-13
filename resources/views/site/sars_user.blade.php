@extends('layouts.layout')

@section('content')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PDF</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label for="inputAddress2" class="form-label">Título para este archivo:</label>
                        <input type="text" class="form-control" id="titulo" placeholder="Introduce el título del documento"
                            required>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="inputAddress2" class="form-label">Parrafo descriptivo</label>
                        <textarea maxlength="450" rows="6" type="text" class="form-control" id="parrafo"
                            placeholder="Introduce el parrafo descriptivo del documento" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="generatePdf()" data-bs-dismiss="modal"
                        class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Listado</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active justify-content-center" id="pills-home" role="tabpanel"
            aria-labelledby="pills-home-tab">

            <a data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-warning mb-3">Exportar a
                Pdf
                <i class="far fa-file-pdf"></i>
            </a>

            <table class="table table-responsive table-dark" id="reportTable">
                <thead class="mt-3">
                    <tr>
                        <th>
                            # No.
                        </th>
                        <th>
                            Folio
                        </th>
                        <th>
                            Fecha
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Dirección
                        </th>
                        <th>
                            Resultado
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reportes as $report)
                        <tr>
                            <td>
                                {{ $report->id }}
                            </td>
                            <td>
                                {{ $report->folio }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse(strtotime($report->ftmuestra))->formatLocalized('%d %B %Y') }}
                            </td>
                            <td>
                                {{ $report->nombres . ' ' . $report->apellidop . ' ' . $report->apellidom }}
                            </td>
                            <td>
                                {{ $report->calle . ' #' . $report->numero . ' Col. ' . $report->colonia }}
                            </td>
                            @if ($report->resultadopcr == 'Pendiente')
                                <td class="bg-warning text-white">
                                    {{ $report->resultadopcr }}
                                </td>
                            @endif
                            @if ($report->resultadopcr == 'Negativo')
                                <td class="bg-success text-white">
                                    {{ $report->resultadopcr }}
                                </td>
                            @endif
                            @if ($report->resultadopcr == 'Positivo')
                                <td class="bg-danger text-white">
                                    {{ $report->resultadopcr }}
                                </td>
                            @endif
                            <td>
                                <div class="row">
                                    @if($report->idEvolucion)
                                    <div class="col-md-4">
                                        <a href="{{ route('download.show', $report->id) }}" class="btn btn-warning text-dark">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No hay registros
                            </td>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
