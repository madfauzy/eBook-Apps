<?php 
    require "../../functions.php";

    if(!isset($_SESSION["username"])){
        header("Location: login.php");
    }

    $ebookPerPage = 10;
    $totalEbook = count(query("SELECT * FROM ebooks"));
    $totalPage = ceil($totalEbook / $ebookPerPage);
    $activePage = isset($_GET["page"]) ? $_GET["page"] : 1;
    $index = $ebookPerPage * $activePage - $ebookPerPage;
    $ebooks = query("SELECT * FROM ebooks LIMIT $index,$ebookPerPage");

    if(isset($_GET["keyword"])){
        $keyword = htmlspecialchars($_GET["keyword"]);
        $totalEbook = searchEbook($keyword);
        $totalPage = ceil(count($totalEbook) / $ebookPerPage);
        $ebooks = searchEbook($keyword,$index,$ebookPerPage);
    }

    $totalEbook = count($ebooks);
?>
<h1 class="h3 mb-4">Total Ebooks: <?= $totalEbook ?></h1>
<?php if($totalEbook === 0) : ?>
<div class="not-found d-flex flex-column align-items-center justify-content-center">
    <i class="bi bi-search" aria-hidden="true"></i>
    <h2 class="my-4">Oops couldn't find any ebooks!</h2>
</div>
<?php else: ?>
    <div class="list-ebook <?php if($totalEbook === 1 || $totalEbook === 2){echo "full-height";}?>">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-2 g-xl-3 g-2">
            <?php foreach($ebooks as $ebook) : ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="row g-0">
                        <div class="col-xl-4 text-center">
                            <img class="img-fluid rounded-start" src="assets/img/<?= $ebook["cover"] ?>" alt="<?= $ebook["cover"] ?>">
                        </div>
                        <div class="col-xl-8">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bold my-2"><?= $ebook["title"] ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Author: <?= $ebook["author"] ?></li>
                                <li class="list-group-item">Category: <?= $ebook["category"] ?></li>
                                <li class="list-group-item">Price: 
                                    <?php if($ebook["price"] === "Free") : ?>
                                    <span class="badge bg-success">Free</span>
                                    <?php else : ?>
                                    <span class="badge bg-danger">Paid</span>
                                    <?php endif; ?>
                                </li>
                            </ul>
                            <div class="card-body text-center">
                                <div class="btn-group" role="group" aria-label="Update and Delete">
                                    <a class="btn btn-sm btn-outline-success" href="update.php?id=<?= $ebook["id"] ?>">Update</a>
                                    <a class="btn btn-sm btn-outline-danger delete-ebook" href="delete.php?id=<?= $ebook["id"] ?>&cover=<?= $ebook["cover"] ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<?php if($totalEbook > 0) : ?>
<nav class="my-4" aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if($activePage <= 1){echo "disabled";}?>">
            <a class="page-link" href="?page=<?= $activePage - 1 ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>">Previous</a>
        </li>
        <?php for($i = 1; $i <= $totalPage; $i++) : ?>
            <li class="page-item <?php if($i == $activePage){echo "active";}?>">
                <a class="page-link" href="?page=<?= $i ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?php if($activePage >= $totalPage){echo "disabled";}?>">
            <a class="page-link" href="?page=<?= $activePage + 1 ?><?php if(isset($keyword)){echo "&keyword=$keyword";}?>">Next</a>
        </li>
    </ul>
</nav>
<?php endif; ?>