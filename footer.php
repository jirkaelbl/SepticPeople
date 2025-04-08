<footer class="mt-auto bg-black">
    <div class="container-fluid row pt-3 pb-1 justify-content-center mx-auto">
        <div class="container col-12 col-lg-4 d-flex flex-column align-items-center text-center">
            <a href="<?php echo home_url(); ?>" class="nav-logo pb-3">
                <img src="<?php echo get_template_directory_uri(); ?>/images/septic_people_logo.jpg" alt="Logo" loading="lazy">
            </a>

            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-2 mt-4 mb-3 w-100">
                <button type="button" class="btn btn-primary kontakt-button fs-5" style="width: 180px;">Pro pořadatele</button>
                <button type="button" class="btn btn-primary kontakt-button fs-5 px-3" style="width: 180px;">Koncerty</button>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">

        </div>
    </div>

    <div class="container-fluid footer-line">
        <div class="d-flex flex-column flex-lg-row pt-4 pb-2 justify-content-center align-items-center">
            <div>
                <a class="text-decoration-none pt-lg-0 pt-3 pb-lg-0 pb-3" href="https://www.facebook.com/septicpeople">
                    <i class="fa-brands fa-facebook-f social-icon"></i>
                </a>
                <a class="text-decoration-none pt-lg-0 pt-3 pb-lg-0 pb-3" href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2Fseptic_people%3Figsh%3DMWF4MXN3NHNqbjV5bw%253D%253D%26fbclid%3DIwZXh0bgNhZW0CMTAAAR5Cd6a4qZVI-1T_OoIOcAe0r9pcRP-u-5VJ6csNgKf3-ff-PhJDAnyDSpIyjg_aem_o6p7GC9GbJt424OzLihzqQ&h=AT3vmYaic0YiwUxy3vk4aj9D6oBSkoTXHPJ062Vobyxah6DW6z8M9Eo3smYxSH2W2OFm8tX5d0SCATjB-irXKzQa9ZuCyC_j1MKZvJ21QbUe-SuRfwjxz_M3uxTqjlhMt_gp5Q">
                    <i class="fa-brands fa-instagram social-icon"></i>
                </a>
                <a class="text-decoration-none pt-lg-0 pt-3 pb-lg-0 pb-3" href="#">
                    <i class="fa-solid fa-envelope social-icon"></i>
                </a>
            </div>
            <div class="mt-lg-0 mt-3">
                <a class="text-decoration-none pt-lg-0 pt-3 pb-lg-0 pb-3" href="#">
                    <i class="fa-brands fa-youtube social-icon"></i>
                </a>
                <a class="text-decoration-none pt-lg-0 pt-3 pb-lg-0 pb-3" href="#">
                    <i class="fa-brands fa-tiktok social-icon"></i>
                </a>
            </div>

        </div>
    </div>
    <div class="container-fluid text-center bg-black footer-line">
        <p class="text-white mb-0 pt-3 pb-1">&copy; <?php echo "Designed and hosted by"; ?><a class="text-decoration-none helgroup-footer" href="https://helgroup.cz/"> Helgroup</a></p>
        <p class="text-white pb-3 mb-0">&copy; <?php echo date("Y"); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>