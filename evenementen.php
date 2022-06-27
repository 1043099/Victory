<html>
<link href="css/evenementen.css" rel="stylesheet" type="text/css">
<nav class="navbar navbar-expand-sm navbar-dark">
    <img src="images/LOGO (2).png" width="200" alt=""> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> 
        <span class="navbar-toggler-icon"></span> 
    </button>
    <div class="end">
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav">
            <li class="nav-item active"> <a class="nav-link mt-2" href="#" data-abc="true" id="clicked">Home<span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link" href="product.php" data-abc="true">producten</a> </li>
                <li class="nav-item "> <a class="nav-link" href="#" data-abc="true">Evenementen</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#" data-abc="true">Contact</a> </li>
				<li class="nav-item"> <a class="nav-link" href="#" data-abc="true">inloggen</a> </li>
            </ul>        
        </div>
    </div>    
</nav>
<!-- Main Body -->

<?php

?>

<table>
    <tr>
        <th>Artiest</th>
        <th>Naam</th>
        <th>statement</th>
        <th>telefoon nr</th>
        <th>activiteit</th>
    </tr>    
    <?php
    require('config.php');


    $sql = "SELECT * FROM artiesten";
    if($result = $conn-> query($sql)){
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>";
            echo $row['naam'];
            echo "</td>";
            echo "<td>";
            echo $row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam'];
            echo "</td>";
            echo "<td>";
            echo $row['statement'];
            echo "</td>";
            echo "<td>";
            echo $row['telefoon']; 
            echo "</td>";
            echo "<td>";
            if($row['actief'] == 1){
                echo "actief";
            }else if ($row['actief'] == 0){
                echo "non actief";
            }
            echo "</td></tr>";
        }
    }

    ?>
</table>

<section>
    <div class="container">
        <div class="row">
        </div>
    </div>
</section>
</html>
