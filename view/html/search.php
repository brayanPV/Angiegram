<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
   <table>
                     <thead>
						<tr>
							<th>usuario</th>
							<th>nombre</th>
							<th>apellido</th>
						</tr>
<tbody>
						<?php session_start();
   // var_dump($_SESSION['busqueda']);
                foreach($_SESSION['busqueda'] as $r): ?>
						<tr>
							<td><?php echo $r->usuario; ?></td>
							<td><?php echo $r->nombre; ?></td>
							<td><?php echo $r->apellido;?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
   
</body>
</html>
