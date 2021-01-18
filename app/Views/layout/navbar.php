<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">
            <img id="home-logo" src="<?= base_url('images/logo.png'); ?>" alt="MovieLBW">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo isset($position) ? ($position == 1 ? 'active' : '') : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/movies/nowPlaying/'); ?>">Movies</a>
                </li>
                <li class="nav-item <?php echo isset($position) ? ($position == 2 ? 'active' : '') : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/tv/onAir/'); ?>">TV</a>
                </li>
                <li class="nav-item <?php echo isset($position) ? ($position == 3 ? 'active' : '') : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/recommendation'); ?>">Recommendation</a>
                </li>
                <li class="nav-item <?php echo isset($position) ? ($position == 4 ? 'active' : '') : ''; ?>">
                    <a class="nav-link" href="<?= base_url('/people/popular/'); ?>">People</a>
                </li>
            </ul>
        </div>

        <form class="form-inline my-2 my-lg-0" action="<?= base_url("/search") ?>" method="GET">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>