<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Section</title>
    <link rel="stylesheet" type="text/css" href="/SOK/css/styles.css" />
</head>
<body> 
    <div class="d-flex">
    <h1 class="title">Edit Section</h1>
    <a href="sections">Back to Dashboard</a>
    </div>

    <form action="edit?id=<?= $section_id ?>" method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($section['name']) ?>" required><br>
        <input type="text" name="data" value="<?= htmlspecialchars($section['data']) ?>"><br>
        <button class="login-button" type="submit">Update Section</button>
    </form>

</body>
</html>
