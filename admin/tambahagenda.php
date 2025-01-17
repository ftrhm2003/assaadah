<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Agenda</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: sans-serif;
            background-color: #e6f0ff; /* Light blue background */
        }

        .container {
            background-color: #fff; /* White container background */
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 600px; /* Adjust this value to your desired width */ 
            max-width: 90%; /* Ensure the container doesn't exceed 90% of the viewport width */
        }

        h1 {
            color: #007bff; /* Blue heading */
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            color: #007bff; /* Blue labels */
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%; 
            padding: 10px;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff; /* Blue button */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin-top: 15px;
        }

        a {
            color: #007bff; /* Blue link */
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <h1>Tambah Agenda</h1>
        <form action="agenda_control.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="1"> 
            <label for="title">Title:</label>
            <input type="text" name="title" required><br><br>

            <label for="date">Date:</label>
            <input type="date" name="date" required><br><br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br><br>

            <label for="file">Upload PDF:</label>
            <input type="file" name="file" accept="application/pdf"><br><br>

            <button type="submit" name="submit">Submit Agenda</button>
        </form>

        <a href="agenda.php">Kembali</a>
    </div>
</body>
</html>