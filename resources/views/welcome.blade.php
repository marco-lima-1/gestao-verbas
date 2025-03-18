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
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
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
            color: white;
            margin-right: 10px;
            display: flex;
            align-items: center;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 40px;
        }
        .main-container {
            background: white;
            padding: 20px;
            width: 100%;
            min-height: 100vh;
            border-radius: 0;
            box-shadow: none;
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
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
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
    </style>
</head>
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

    <div class="container-fluid main-container">
        <h3>Gestão de Verbas</h3>

        <form id="marketing-form" class="form-container">
            <div class="form-group">
                <label for="acao">Ação</label>
                <select id="acao" class="form-control" required>
                    <option value="">Selecione o tipo da ação...</option>
                    <option value="Palestra">Palestra</option>
                    <option value="Evento">Evento</option>
                    <option value="Apoio Gráfico">Apoio Gráfico</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data_prevista">Data prevista</label>
                <input type="date" id="data_prevista" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="investimento">Investimento previsto</label>
                <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    <input type="number" id="investimento" class="form-control" required>
                </div>
            </div>
            <div class="button-group">
                <button type="button" class="btn btn-limpar"><i class="fa fa-refresh"></i> Limpar</button>
                <button type="submit" class="btn btn-adicionar"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </form>

        <hr>

        <div class="table-container">
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
                    <tr>
                        <td>Palestra</td>
                        <td>17/07/2024</td>
                        <td>R$ 100,00</td>
                        <td><i class="fa fa-pencil-alt" style="color:blue; cursor:pointer;"></i></td>
                        <td><i class="fa fa-trash" style="color:red; cursor:pointer;"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        © 2024 <b>PHARMAVIEWS</b>. Todos os direitos reservados.
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#marketing-table').DataTable();
            $('#data_prevista').attr('min', new Date(new Date().setDate(new Date().getDate() + 10)).toISOString().split('T')[0]);
        });
    </script>
</body>
</html>
