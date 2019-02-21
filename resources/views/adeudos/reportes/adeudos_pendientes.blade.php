<style>
    @media print {
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            font: normal 12px Arial, Helvetica, sans-serif; 
            border: solid 1px #FE9A2E;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #FE9A2E;
            color: white;
            font-weight: bold;
        }
     }
    
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
        font: normal 12px Arial, Helvetica, sans-serif; 
        border: solid 1px #FE9A2E;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #FE9A2E;
        color: white;
    }
        
    body {
        font: normal 10px Arial, Helvetica, sans-serif; 
    }
</style>

<table width='100%'>
    <tr>
            <td align="center"  >
                <h3>
                    Adeudos Pendientes {{$plantel->razon}}
                </h3>
            </td>
        </tr>
</table>

<div class="datagrid">
    <table width='100%'>
        <thead>
        <th><strong>Estudios</strong></th>    
        <th><strong>Cliente</strong></th>
        <th><strong>Monto</strong></th>
        </thead>
        <tbody>
            <?php
            $suma = 0;
            $totalCliente = 0;
            $cliente_id = 0;
            $aux = 0;
            ?>
            @foreach($adeudos as $adeudo)

            <tr>
                <td>{{$adeudo->especialidad." / ".$adeudo->nivel." / ".$adeudo->grado}}</td>
                <td>{{$adeudo->cliente." - ".$adeudo->nombre." ".$adeudo->nombre2." ".$adeudo->ape_paterno." ".$adeudo->ape_materno}}</td>
                <td>{{number_format($adeudo->monto,2)}}</td>
            </tr>
            <?php 
            $suma=$suma+$adeudo->monto;
            ?>
            @endforeach
            <tr class="alt"><td></td><td><strong>Total </strong></td><td><strong>{{number_format($suma,2)}}</strong></td></tr>
            
        </tbody>
    </table>
    
</div>

