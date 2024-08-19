<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="/SOK/css/styles.css" />
</head>
<body>
    <div class="container">
        <div class="d-flex">
            <h1 class="title">Sections</h1>
            <a class="logout" href="/SOK/">Logout</a>
        </div>
        <h2>Create section</h2>
        <form method="post">
            <label for="name">Title</label>
            <input type="text" id="Title" name="title" required>
            <label for="text">Text</label>
            <input type="text" id="Text" name="text">
            <label for="text">Parent section</label>
            <select name="id">
                <option value="null">---None---</option>
                <?php
                    $titles = read($pdo);
                    foreach($titles as $title){
                        echo $title;
                        echo "<option value={$title['id']}>{$title['name']} </option>" ;
                    }
                ?>
            </select>
            <button type="submit">Create</button>
        </form>


        <?php
        require 'config/db.php';
            
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            create($pdo, $_POST['id'], $_POST['title'], $_POST['text']);
        };
        $user_id = $_SESSION['user_id'];

        function fetchSections($pdo, $parent_id = null, $user_id) {
            $stmt = $pdo->prepare('SELECT * FROM sections WHERE user_id = ? AND parent_id ' . ($parent_id ? '= ?' : 'IS NULL'));
            $stmt->execute($parent_id ? [$user_id, $parent_id] : [$user_id]);
            return $stmt->fetchAll();
        }

        function displayTree($pdo, $sections) {
            echo '<ul>';
            foreach ($sections as $section) {
                echo '<li class="section">';
                echo '<strong>' . htmlspecialchars($section['name']) . '</strong>: ' . htmlspecialchars($section['data']);
                echo ' [<a href="edit?id=' . $section['id'] . '">Edit</a>] [<a href="delete?id=' . $section['id'] . '">Delete</a>]';
                $subsections = fetchSections($pdo, $section['id'], $section['user_id']);
                if ($subsections) {
                    displayTree($pdo, $subsections);
                }
                echo '</li>';
            }
            echo '</ul>';
        }

        $sections = fetchSections($pdo, null, $user_id);
        displayTree($pdo, $sections);

        ?>

    </div>
</body>