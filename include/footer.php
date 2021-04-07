<footer class="text-center bc-red c-yellow footer mt-auto">
    <div class="container p-4">
        <div class="row">
            <div class="mb-4 mb-md-0 fw-bold"> <!-- removed from class: col-lg-6 col-md-12 -->
              <p>
                <h4><a class="c-yellow" href="<?php echo $_SESSION['url']; ?>FAQ.php">FAQ</a></h4>
              </p>
                <p class="c-yellow">
                    <h4> Contact:</h4> Mail: example@example.com <br> <?php echo $arraytekst['phone'] ?> nr: +31 123456789 <br> <?php echo $arraytekst['adres'] ?>: Nederland, Harderwijk, Westeinde 33
                </p>

            </div>
        </div>
    </div>
    <div class="text-center p-3 fw-bold" style=" background-color: rgba(151, 0, 0, 0.5);">
        © 2021 Copyright:
        <a>SD20-1</a>
    </div>
</footer>
