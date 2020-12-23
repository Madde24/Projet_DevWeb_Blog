<header>
<div class="titre1">
<p> </p>
<h1> <strong> Sharing </strong> your story <strong> today </strong> might <strong> safe </strong> somebody <strong> tomorrow </strong> </h1>
<p> </p>
</div>



<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php?action=home">ShareAndCare</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?action=liste&&page=post">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Send us an email!</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ConnectAndShare</a>
        <div class="dropdown-menu">
        <?php if ($session->get('id')){ ?>
          <a class="dropdown-item" href="index.php?page=client&&action=disconnect">Deconnexion</a>
          <a class="dropdown-item" href="index.php?page=client&&action=read">Your acount</a>
        <?php } else{ ?>
          <a class="dropdown-item" href="index.php?page=client&&action=connect">Connexion</a>
          <a class="dropdown-item" href="index.php?page=client&&action=create">Create your acount</a>
        <?php } ?>
        </div>
      </li>
      <?php if($session->get('id')){ ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=create&&page=post">Share your stories</a>
      </li>
      <?php } ?>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</header>