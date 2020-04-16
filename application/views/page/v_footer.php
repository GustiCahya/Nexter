<footer class="footer">
            <div class="footer__item">
                <a href="<?=base_url()?>" class="footer__link btn">Home</a>
                <?php foreach($pages as $page){ ?>
                    <a href="<?=base_url('page/').$page['slug']?>" class="footer__link btn"><?=$page['title']?></a>
                <?php } ?>
                <a href="<?=base_url('blogs')?>" class="footer__link btn">Blogs</a>
                <a href="<?=base_url('properties')?>" class="footer__link btn">Properties</a>
            </div>
            <p class="footer__desc">
                &copy; Nexter 2020.
            </p>
        </footer>
    </body>
</html>