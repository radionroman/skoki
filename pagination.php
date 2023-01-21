<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
<div class="container well">
    <div class="row">
        <div class="col-md-10">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                    <?php if($page == 1)echo '<li class= "page-item disabled">';
                     else echo '<li class= "page-item">'; 
                     ?>
                      <a class="page-link" href="<?= $currentPage ?>?page=<?= $Previous; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                        <?php if($page == $i)echo '<li class= "page-item disabled">';
                     else echo '<li class= "page-item">'; 
                     ?>
                            <a class="page-link" href="<?= $currentPage ?>?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                   <?php if($page == $pages)echo '<li class= "page-item disabled">';
                     else echo '<li class= "page-item">'; 
                     ?>
                      <a class="page-link" href="<?= $currentPage ?>?page=<?= $Next; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
    </div>
</div>