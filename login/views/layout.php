<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Công Việc</title>
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: tomato;
        }
        tr:hover {
            background-color: lightblue;
        }
        .completed {
            text-decoration: line-through;
            color: red;
            font-style: italic;
        }
        h2 {
            color: red;
        }
    </style>
</head>
<body>
    
    <form method="post" action="">
        <button type="submit" name="logout">Đăng xuất</button>
    </form>

    <?php if (isset($_SESSION['username'])): ?>
        <h2>Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?> !</h2>
    <?php else: ?>
        
    <?php endif; ?>
</body>
</html>