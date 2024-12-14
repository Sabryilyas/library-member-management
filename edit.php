<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM members WHERE id = $id");
$member = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    $conn->query("UPDATE members SET name = '$name', email = '$email', contact = '$contact' WHERE id = $id");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5; 
            color: #333;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
            margin: 30px 0;
            font-weight: 600;
            font-size: 2.5rem;
            color: #1d1d1f;
        }

        a {
            text-decoration: none;
            font-size: 1rem;
            color: #007aff;
            transition: all 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px 30px;
            background: rgba(255, 255, 255, 0.8); 
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 500;
            margin-bottom: 5px;
            color: #1d1d1f;
        }

        input {
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #f9f9fb;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #007aff;
            box-shadow: 0 0 8px rgba(0, 122, 255, 0.3);
        }

        button {
            padding: 12px;
            background-color: #007aff; 
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #005bb5;
            transform: scale(1.05);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .container {
                padding: 15px;
            }

            button {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Edit Member</h1>
    <div class="container">
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $member['name']; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $member['email']; ?>" required>
            
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $member['contact']; ?>" required>
            
            <button type="submit">Update Member</button>
        </form>
        <a href="index.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>

