<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

    <form action="/tags" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Etiqueta">
        <input type="submit" value="Agregar">
    </form>
    <h4>Listado de etiquetas</h4>
      <table>
          @forelse($tags as $tag)
              <tr>
                  <td>
                      {{$tag->name}}
                  </td>
                  <td>
                      <form action="/tags/{{$tag->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <input type="submit" value="Eliminar">
                      </form>
                  </td>
              </tr>
          @empty
            <tr>
                <td>No hay etiquetas</td>
            </tr>
          @endforelse
      </table>
    </body>
</html>
