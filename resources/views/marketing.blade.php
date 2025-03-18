<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Verbas - PharmaViews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: rgb(233, 233, 233);
            margin: 0;
            padding: 0;
            color: rgb(126, 126, 126);
        }

        .navbar {
            background-color: #3b5998;
            color: white;
            padding: 10px 15px;
            width: 100%;
        }

        .navbar-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            color: rgb(233, 233, 233);
            margin-right: 10px;
            display: flex;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 50px;
        }

        .main-container {
            width: 100%;
            min-height: 100vh;
            border-radius: 0;
            box-shadow: none;
        }

        .title-header {
            margin: 10px 0 10px 15px;
        }

        .btn-limpar {
            background-color: #f0ad4e;
            color: white;
        }

        .btn-adicionar {
            background-color: #5cb85c;
            color: white;
        }

        .footer {
            background-color: #3b5998;
            color: rgb(233, 233, 233);
            text-align: left;
            padding: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding-left: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            width: 100%;
        }

        .form-container .form-group {
            flex: 1;
            min-width: 200px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        .dataTables_info,
        .dataTables_paginate,
        .dataTables_filter {
            display: none !important;
        }

        #flutuante-form {
            background-color: white;
            width: 100%;
            padding: 20px;
            border-radius: 0;
            box-shadow: none;
        }
    </style>
</head>

<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Ação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit-id">
                    <div class="form-group">
                        <label for="edit-tipo">Ação</label>
                        <select id="edit-tipo" name="tipo" class="form-control">
                            <option value="Palestra">Palestra</option>
                            <option value="Evento">Evento</option>
                            <option value="Apoio Gráfico">Apoio Gráfico</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label for="edit-data_prevista">Data prevista</label>

                        <input type="text" id="edit-data_prevista" name="data_prevista" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit-investimento">Investimento previsto</label>
                        <input type="number" id="edit-investimento" name="investimento" class="form-control" step="0.01">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
</div>


<body>
    <nav class="navbar navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="menu-icon"><i class="fa fa-bars"></i></span>
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('pharmaviews_logo.png') }}" alt="PharmaViews">
                </a>
            </div>
        </div>
    </nav>

    <div class="">
        <h3 class="title-header">Gestão de Verbas</h3>
        <div id="flutuante-form">
            <form id="marketing-form" class="form-container" action="{{ route('acoes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tipo">Ação</label>
                    <select id="tipo" name="tipo" class="form-control" required>
                        <option value="">Selecione o tipo da ação...</option>
                        <option value="Palestra">Palestra</option>
                        <option value="Evento">Evento</option>
                        <option value="Apoio Gráfico">Apoio Gráfico</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="data_prevista">Data prevista</label>
                    <input type="text" id="data_prevista" name="data_prevista" class="form-control datepicker"
                        placeholder="DD/MM/AAAA"
                        value="{{ old('data_prevista') ? date('d/m/Y', strtotime(old('data_prevista'))) : '' }}" required>
                </div>



                <div class="form-group">
                    <label for="investimento">Investimento previsto</label>
                    <div class="input-group">
                        <span class="input-group-addon">R$</span>
                        <input type="number" id="investimento" name="investimento" class="form-control" step="0.01" required placeholder="0,00">
                    </div>
                </div>
                <div class="button-group">
                    <button type="button" class="btn btn-limpar"><i class="fa fa-refresh"></i> Limpar</button>
                    <button type="submit" class="btn btn-adicionar"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </form>


            <div class="table">
                <table id="marketing-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Data prevista</th>
                            <th>Investimento previsto</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($acoes as $acao)
                        <tr>
                            <td>{{ $acao->tipo }}</td>
                            <td>{{ date('d/m/Y', strtotime($acao->data_prevista)) }}</td>
                            <td>R$ {{ number_format($acao->investimento, 2, ',', '.') }}</td>
                            <td>
                                <a href="#" class="editar-acao" data-id="{{ $acao->id }}" data-tipo="{{ $acao->tipo }}" data-data_prevista="{{ $acao->data_prevista }}" data-investimento="{{ $acao->investimento }}">
                                    <i class="fa fa-pencil-alt" style="color:blue; cursor:pointer;"></i>
                                </a>
                            </td>
                            <td>
                                <form id="delete-form" action="{{ route('acoes.destroy', $acao->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:none; cursor:pointer;">
                                        <i class="fa fa-trash" style="color:red;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="footer">
        © 2024 <b>PHARMAVIEWS</b>. Todos os direitos reservados.
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <script>
        $(document).ready(function() {

            $("#data_prevista").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: +10,
                dayNamesMin: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                showAnim: "slideDown"
            });

            $("#marketing-form").submit(function(event) {
                let dataSelecionada = $("#data_prevista").val().split('/');
                let dataMinima = new Date();
                dataMinima.setDate(dataMinima.getDate() + 10);

                let dataFormatada = new Date(dataSelecionada[2], dataSelecionada[1] - 1, dataSelecionada[0]); // Converte para objeto Date

                if (dataFormatada < dataMinima) {
                    alert("A data deve ser no mínimo 10 dias a partir de hoje.");
                    event.preventDefault();
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#marketing-table').DataTable({
                "paging": false,
                "info": false,
                "searching": false,
                "order": [
                    [1, "asc"]
                ],
                "columnDefs": [{
                        "orderable": true,
                        "targets": [0, 1, 2]
                    },
                    {
                        "orderable": false,
                        "targets": [3, 4]
                    }
                ]
            });
        });
        $(document).ready(function() {
            $(".btn-limpar").click(function() {
                $("#marketing-form")[0].reset();
            });
        });
        $(document).ready(function() {
            $(document).on("submit", "#delete-form", function(event) {
                event.preventDefault();

                let form = $(this);
                let url = form.attr("action");
                let row = form.closest("tr");

                if (confirm("Tem certeza que deseja excluir esta ação?")) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: form.serialize(),
                        success: function() {
                            row.fadeOut(300, function() {
                                $(this).remove();
                            });
                        },
                        error: function(error) {
                            console.log("Erro ao excluir ação:", error);
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            let hoje = new Date();
            hoje.setDate(hoje.getDate() + 10);
            let dataMinima = hoje.toLocaleDateString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            $("#data_prevista").attr("min", dataMinima);
            $('.date-format').mask('00/00/0000');



            $(document).ready(function() {
                $('.money-format').mask('000.000.000,00', {
                    reverse: true
                });
            });
        });
    </script>

<script>
    $(document).ready(function () {


        function formatarDataParaEnvio(data) {
            if (!data) return '';
            let partes = data.split('/');
            return partes.length === 3 ? `${partes[2]}-${partes[1]}-${partes[0]}` : data;
        }


        function formatarDataParaExibir(data) {
            if (!data) return '';
            let partes = data.split('-');
            return partes.length === 3 ? `${partes[2]}/${partes[1]}/${partes[0]}` : data;
        }


        $(".editar-acao").click(function () {
            let id = $(this).data("id"),
                tipo = $(this).data("tipo"),
                dataPrevista = formatarDataParaEnvio($(this).data("data_prevista")),
                investimento = $(this).data("investimento");

            $("#edit-id").val(id);
            $("#edit-tipo").val(tipo);
            $("#edit-data_prevista").val(dataPrevista);
            $("#edit-investimento").val(investimento);

            $("#editModal").modal("show");
        });

        $("#edit-form").submit(function (event) {
            event.preventDefault();

            let id = $("#edit-id").val(),
                url = `/acoes/${id}`,
                dataPrevista = formatarDataParaEnvio($("#edit-data_prevista").val()); // Converte antes de enviar

            let dados = {
                _method: "PUT",
                _token: "{{ csrf_token() }}",
                tipo: $("#edit-tipo").val(),
                data_prevista: dataPrevista,
                investimento: $("#edit-investimento").val()
            };

            $.ajax({
                url: url,
                type: "POST",
                data: dados,
                success: function (response) {
                    $("#editModal").modal("hide");

                    let row = $(`a[data-id='${id}']`).closest("tr");
                    row.find("td:nth-child(1)").text(response.tipo);
                    row.find("td:nth-child(2)").text(formatarDataParaExibir(response.data_prevista));
                    row.find("td:nth-child(3)").text("R$ " + response.investimento);

                    alert("Ação atualizada com sucesso!");
                },
                error: function (error) {
                    console.log("Erro ao atualizar ação:", error);
                    alert("Ocorreu um erro ao atualizar a ação.");
                }
            });
        });
    });
</script>


    <script>
        $(document).ready(function() {
            let hoje = new Date();
            hoje.setDate(hoje.getDate() + 10);
            let dataMinima = hoje.toISOString().split('T')[0];

            $("#data_prevista").attr("min", dataMinima);


            $("#marketing-form").submit(function(event) {
                let dataSelecionada = $("#data_prevista").val();
                if (dataSelecionada < dataMinima) {
                    alert("A data deve ser no mínimo 10 dias a partir de hoje.");
                    event.preventDefault();
                }
            });
        });
    </script>
</body>

</html>
