<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <!-- Breadcrumb Navigation-->
        <nav aria-label="You are here:" role="navigation" class="hide-for-small-only">
            <ul class="breadcrumbs">
                <li><a href="/">Dashboard</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Locations
                </li>
            </ul>
        </nav>

        <main id="main" class="large-8 medium-8 columns" role="main">

            <?php include ('parts/content-locations-tabs.php') ?>

        </main> <!-- end #main -->

        <aside class="large-4 medium-4 columns ">

            <section class="block">

                <p>Links</p>

            </section>

        </aside> <!-- end #aside -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>