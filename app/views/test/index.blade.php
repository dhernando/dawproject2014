@foreach ($dades as $dada)
	<tr>
	    <td>{{ $dada->nombre }}</td>
	    <td>{{ $dada->descripcion }}</td>
	    <td>{{ $dada->busquedas}}</td>
	    <td>{{ HTML::image('uploads/'.AppHelper::clean($dada->nombre).'/'.$dada->imagen.'.jpg', $dada->nombre, array('class' => 'imageGroup')) }}</td>
	</tr>
@endforeach

<?php print_r($json);?>