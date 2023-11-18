<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.min.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <?php include('header.php'); ?>

    <h1>Contact</h1>

    <form action="process-form.php" method="post">

        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="email">Email</label>
        <input type="email" id="email" name="email">
        
        <label for="message">Message</label>
        <textarea id="message" name="message"></textarea>

        <label for="priority">Priority</label>
        <select id="priority" name="priority">
            <option value="1">Low</option>
            <option value="2" selected>Medium</option>
            <option value="3">High</option>
        </select>

        <br>

        <button>Send</button>

    </form>

</body>
</html>
