<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/'); ?>">MovieLBW</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/movies'); ?>">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/recommendation'); ?>">Recommendation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/peoples'); ?>">People</a>
                </li>
            </ul>

            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <a class = "nav-link">Login</a>
                </li>
            </ul>
        </div>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>