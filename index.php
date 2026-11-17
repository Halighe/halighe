<?php
require __DIR__ . "/db.php";

$sql = "select id, name, path, description from material";

$result = $pdo->prepare($sql);
$result->execute();
// while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//  print_r($row);
// }
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Моя первая страница</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-menu">
                <div>
                    <img class="header-logo" src="img/image.png" alt="логотип">
                </div>
                <div>
                    <nav>
                        <ul>
                            <li class="header-menu-item">
                                Обо мне
                            </li>
                            <li class="header-menu-item">
                                <a href="#projects" style="
                                all: unset; 
                                cursor: pointer;">
                                    Мои проекты
                                </a>
                            </li>
                            <li class="header-menu-item">
                                Контакты
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div id="projects">
                <h1>Проекты</h1>
                <div class="projects">
                    <?php foreach ($result as $material): ?>
                        <div class="project-item">
                            <h3><?= $material['name'] ?></h3>
                                <p class="project-description"><?= $material['description'] ?></p>
                                <img src="<?= $material['path'] ?>" alt="">
                                <a href="/web1/material.php?id=<?= $material['id'] ?>">
                                    Подробнее
                            </a>
                        </div>
                    <?php endforeach; ?>
                    

                </div>
            </div>
        </div>
    </main>

</body>

</html>