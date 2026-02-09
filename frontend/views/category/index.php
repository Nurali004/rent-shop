<?php

?>


<section id="portfolio" class="portfolio section">


    <!-- Section Title -->
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Categories</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="portfolio-filters isotope-filters aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <?php foreach ($categories as $category): ?>
                <li data-filter="*" class="filter-active"><?= $category->name ?></li>
                <?php endforeach; ?>
            </ul><!-- End Portfolio Filters -->

            <div class="row gy-4 isotope-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 3320.34px;">
                <?php foreach ($categories as $category): ?>
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app" style="position: absolute; left: 0px; top: 0px;">
                    <img src="/<?= $category->img ?>" width="250" class="img-fluid" alt="">
                    <div class="portfolio-info">

                        <p>Lorem ipsum, dolor sit</p>
                        <a href="/<?= $category->img ?>" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div><!-- End Portfolio Item -->

                <?php endforeach; ?>
            </div><!-- End Portfolio Container -->

        </div>

    </div>



</section>
