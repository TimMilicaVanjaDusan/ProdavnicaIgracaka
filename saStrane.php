<div class="panel panel-default sidebar-menu"><!-- pocetak panela-->
    <div class="panel-heading">
        <h3 class="panel-title">Tipovi igračaka</h3>
    </div>
    
    <div class="panel-body"><!-- definisanje stavki panela -->
        <ul class="nav nav-pills nav-stacked category-menu">
                    <?php
                       
                       $pol = "za devojcice";
                       ?>
            <li><a href="poPolu.php?pol=<?php echo str_replace(' ', '_', $pol);?>">Devojčice</a></li>
            <?php
                       $pol = "za decake";
                       ?>
            <li><a href="poPolu.php?pol=<?php echo str_replace(' ', '_', $pol);?>">Dečaci</a></li>

            <?php
                $pol = "za oba pola";
            ?>
            <li><a href="poPolu.php?pol=<?php echo str_replace(' ', '_', $pol);?>">Oba pola</a></li>
            
        </ul>
    </div>
    
</div> <!-- kraj panela 1 -->

<div class="panel panel-default sidebar-menu"><!-- pocetak panela 2 -->
    <div class="panel-heading">
        <h3 class="panel-title">Kategorija igračaka</h3>
    </div>
    
    <div class="panel-body"><!-- definisanje stavki panela 2 -->
    
        <ul class="nav nav-pills nav-stacked category-menu">
        <?php
        
        if (!$q=$db->vratiSveKategorije())
        {
            echo "<p>Nastala je greska pri izvodenju upita</p>";
            die();
        }
        if (mysqli_num_rows($q)==0)
        {
            echo "Nema kategorija!";
        } 
        else {
            while ($red=mysqli_fetch_array($q))
            {
              
    ?>
        
            <li><a href="poKategoriji.php?nazivKategorije=<?php echo str_replace(' ','_',$red["nazivKategorije"]);?>"><?php echo $red["nazivKategorije"] ?></a></li>
            <!-- <li><a href="#">Edukativni setovi</a></li>
            <li><a href="#">Bicikle, trotineti</a></li>
            <li><a href="#">Figure,roboti,životinje</a></li>
            <li><a href="#">Muzički instrumenti</a></li> -->
            <?php
                    }
                }
            ?>
        </ul>
    </div>
    
</div>