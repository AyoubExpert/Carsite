<footer>
    <div class="brand">
        <h2>Rydr.</h2>
        <p>Stap in. Rij weg. Simpel.</p>
    </div>
    <div class="footer-links">
        <div class="links">
            <h3>Over ons</h3>
            <ul>
                <li><a href="<?= $bases_url ?>../Index.php?page=Team">Het team</a></li>
                <li><a href="<?= $bases_url ?>../Index.php?page=Vision">Onze visie</a></li>
                <li><a href="<?= $bases_url ?>../Index.php?page=Careers">Vacatures</a></li>
            </ul>
        </div>
        <div class="links">
            <h3>Community</h3>
            <ul>
                <li><a href="<?= $bases_url ?>../Index.php?page=Events">Events</a></li>
                <li><a href="<?= $bases_url ?>../Index.php?page=Blog">Blog</a></li>
                <li><a href="<?= $bases_url ?>../Index.php?page=Podcast">Podcast</a></li>
                <li><a href="<?= $bases_url ?>../Index.php?page=InviteAFriend">Invite a friend</a></li>
            </ul>
        </div>
        <div class="links">
            <h3>Socials</h3>
            <ul>
                <li><a href="#">Discord</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ul>
        </div>
    </div>
</footer>

<div class="legal-footer">
    <div class="legal">
        <div class="copyright">
            © <?= date("Y") ?> Rydr. All rights reserved
        </div>
    </div>
    <div class="legal-links">
        <ul>
            <li><a href="#">Privacy & Policy</a></li>
            <li><a href="#">Terms & Condition</a></li>
        </ul>
    </div>
</div>

<div id="loginModal" class="modal hidden">
    <div class="modal-content">
        <h2>Welkom bij Rydr</h2>
        <p>Kies hoe je verder wilt gaan:</p>
        <div class="modal-actions">
            <form method="GET" action="<?= $bases_url ?>../Index.php" onsubmit="setCity(this)">
                <input type="hidden" name="page" value="Login">
                <button type="submit" class="button-secondary">Login</button>
            </form>

            <form method="GET" action="<?= $bases_url ?>../Index.php" onsubmit="setCity(this)">
                <input type="hidden" name="page" value="Signup">
                <button type="submit" class="button-primary">Signup</button>
            </form>
        </div>
        <button class="modal-close">&times;</button>
    </div>
</div>
<script type="module" src="Website/Assets/Includes/Main.js"></script>
</body>

</html>