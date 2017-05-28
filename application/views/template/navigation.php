<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Prenájom prevádzok</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Prenájom prevádzok</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url() . 'index.php';?>">Domov</a></li>
                <li><a href="<?php echo base_url() . 'index.php/about';?>">Popis</a></li>
                <li><a href="<?php echo base_url() . 'index.php/job';?>">Zadanie</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tabuľky <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('/index.php/users/')?>">Zoznam majiteľov</a></li>
                        <li><a href="<?php echo base_url('/index.php/stores/')?>">Zoznam prevádzok</a></li>
                        <li><a href="<?php echo base_url('/index.php/floors/')?>">Zoznam poschodí</a></li>
                        <li><a href="<?php echo base_url('/index.php/rents/')?>">Zoznam nájmov</a></li>
                        <li><a href="<?php echo base_url('/index.php/owners/')?>">Majitelia prevádzok</a></li>
                        <li><a href="<?php echo base_url('/index.php/rs/')?>">Nájom prevádzok</a></li>
                        <li><a href="<?php echo base_url('/index.php/electro/')?>">Elektrina</a></li>
                        <li><a href="<?php echo base_url('/index.php/gas/')?>">Plyn</a></li>
                        <li><a href="<?php echo base_url('/index.php/water/')?>">Voda</a></li>
                        <li><a href="<?php echo base_url('/index.php/energies/')?>">Energie</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<br />
<br />
<br />