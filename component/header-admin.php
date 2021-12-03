<?php $q = "" ?>
<header>
    <ul>
        <li>
            <a href="/admin">
                <b>
                    OurAnimeList
                </b>
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/create?q=index">
                Tambah
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/add-from-api?type=anime&page=1&subtype=tv">
                Tambah dari API
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/add-top-season-api?year=2021&season=fall">
                Tambah sesaon API
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/list-author?q=index">
                Author
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/list-manga?q=index">
                Manga
            </a>
        </li>
        <li>
            <a class="<?= $q === "index" ? "active-tab" : "" ?>" href="/admin/list-user?q=index">
                List User
            </a>
        </li>
        <li style="float:right">
            <form class="logOut" action="/" method="POST">
                <button type="submit" value="logut" name="logout">
                    <p class="center">Log Out <svg style="padding-left:5px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg></p>
                </button>
            </form>
        </li>
    </ul>
</header>