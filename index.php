<?php
include 'db.php';

$result = $conn->query("SELECT * FROM members");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Members</title>
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
            transition: all 0.3s ease;
        }

        .container {
            max-width: 90%;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007aff;
            color: #fff;
            border-radius: 10px;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            background-color: #005bb5;
            transform: scale(1.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #eaeaea;
        }

        th {
            background-color: #f5f5f7;
            font-weight: 600;
            font-size: 1rem;
            color: #1d1d1f;
        }

        tr:nth-child(even) {
            background-color: #f9f9fb;
        }

        tr:hover {
            background-color: #f0f0f3;
            transition: background-color 0.3s ease;
        }

        .action-btn {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            margin: 0 5px;
            color: #fff;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .edit-btn {
            background-color: #34c759;
        }

        .edit-btn:hover {
            background-color: #2aa44f;
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #ff3b30;
        }

        .delete-btn:hover {
            background-color: #d63427;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            th, td {
                padding: 10px;
                font-size: 0.9rem;
            }

            h1 {
                font-size: 2rem;
            }

            .add-btn {
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <h1>Library Members</h1>
    <div class="container">
        <a href="add.php" class="add-btn">Add New Member</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="action-btn delete-btn">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
