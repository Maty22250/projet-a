<table class='table table-striped'>
<?php
echo '
<tr>
    <th>secteur</th>
    <th>Liaison</th>
    <th>Liaison</th>
    <th>Liaison</th>
    <th>Liaison</th>
</tr>';

echo"<tr>
    <th>            </th>
    <th>Code Liaison</th>
    <th>Distance en milles marin</th>
    <th>Port de départ</th>
    <th>Port d'arrivée</th>
</tr>";


foreach ($LesLiaison as $UneLiaison):
echo"<tr>";
    
    echo "<td>";
    echo '<a href= Atlantik ' . base_url('NOMSECTEUR/' . $UneLiaison->NOLIAISON) . '">' . $UneLiaison->NOLIAISON . '</a>';
    echo "</td>";
    echo "<td>";
    echo '<a' . base_url('Noliaison/' . $UneLiaison->NOLIAISON) . '">' . $UneLiaison->NOLIAISON . '</a>';
    echo "</td>";
    echo "<td>";
    echo '<a' . base_url('distance/' . $UneLiaison->DISTANCE) . '">' . $UneLiaison->DISTANCE . '</a>';
    echo "</td>";
    echo "<td>";
    echo '<a' . base_url('PORT_DEPART/' . $UneLiaison->NOPORT_DEPART) . '">' . $UneLiaison->NOPORT_DEPART . '</a>';
    echo "</td>";    
    echo "<td>";
    echo '<a' . base_url('PORT_ARRIVEE/' . $UneLiaison->NOPORT_ARRIVEE) . '">' . $UneLiaison->NOPORT_ARRIVEE . '</a>';
    echo "</td>";
endforeach
?>
</table> 