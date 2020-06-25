<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">
        <a class="navbar-brand" href="#">Media library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=Config::SITE_URL?>index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=Config::SITE_URL?>controller/artist_index_controller.php">Artist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=Config::SITE_URL?>controller/song_index_controller.php">Song</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=Config::SITE_URL?>controller/genre_index_controller.php">Genre</a>
            </li>
          </ul>
        </div>
</nav>