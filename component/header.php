<header>
    <ul>
        <li>
            <a href="/">
                <b>
                    OurAnimeList
                </b>
            </a>
        </li>
        <li>
            <a class="<?= $q === "anime" ? "active-tab" : "" ?>" href="/top?q=anime">
                Top Anime
            </a>
        </li>
        <li>
            <a class="<?= $q === "manga" ? "active-tab" : "" ?>" href="/top?q=manga">
                Top Manga
            </a>
        </li>
        <li>
            <a class="<?= $q === "season" ? "active-tab" : "" ?>" href="/seasonal?year=<?= $year ?>&season=<?= $season ?>">
                Seasonal
            </a>
        </li>
        <li style="float:right">
            <form class="logOut" action="" method="POST">
                <button type="submit" value="logut" name="logout">
                    <p class="center">Log Out <svg style="padding-left:5px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg></p>
                </button>
            </form>
        </li>
        <li style="float:right">
            <a class="<?= $q === "about" ? "active-tab" : "" ?>" href="/about/">
                About
            </a>
        </li>
        <li style="float:right" class="profile">
            <a class="<?= $q === "profile" ? "active-tab" : "" ?>" href="/profile/">
                <p><?= $user['username'] ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                </p>
            </a>
        </li>
    </ul>
</header>