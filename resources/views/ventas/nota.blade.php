<!DOCTYPE html>
<html>
<head>
    <title>Ganadera</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h2 style="text-align: center">{{ $title }}</h2>
    <h3 style="text-align: center">{{ $subtitle}}</h3>
    <hr class="mt-4"/>
    <p><strong>Cliente: </strong>{{$venta->productor->nombre.' '.$venta->productor->apellidos}}</p>
    <p><strong>RFC: </strong>{{$venta->productor->RFC}}</p> 
    <p><strong>Fecha de venta: </strong>{{ date('d/m/Y', strtotime($venta->created_at))}}</p>
    <table class="table table-sm table-borderless">
        <thead class="thead-light">
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->productos as $producto)
            <tr>
                <td>{{ $producto->clave }}</td>
                <td>{{ $producto->nombre }}</td>
                <td style="text-align: right">{{ $producto->pivot->cantidad }}</td>
                <td style="text-align: right">{{ $producto->pivot->precio }}</td>
            </tr>
            @endforeach
            <br />
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold;">Subtotal</td>
                <td style="text-align: right;" >{{number_format($venta->importe,2)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold;">Descuento</td>
                <td style="text-align: right;">{{number_format($descuento,2)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style="font-weight: bold;">Total</td>
                <td style="text-align: right;">{{number_format($total,2)}}</td>
            </tr>
        </tbody>
       
    </table>
</body>
</html>