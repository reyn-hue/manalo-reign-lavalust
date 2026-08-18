<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 8px 0;
        }
        strong {
            color: #34495e;
        }
        nav {
            text-align: center;
            margin-top: 20px;
        }
        nav a {
            text-decoration: none;
            color: #d44b06;
            font-weight: bold;
            margin: 0 10px;
        }
        nav a:hover {
            color: #f7c604;
        }
        title {
            text-align: center;
            font-size: 24px;
            color: #052547;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Student Profile</h1>
     <nav>
        <a href="<?= site_url('/student') ?>">Home</a>
        <a href="<?= site_url('/student/profile') ?>">Student Profile</a>
    </nav>
    <br>
    <p><strong>Student ID:</strong> <?= $student_id; ?></p>
    <p><strong>Name:</strong> <?= $name; ?></p>
    <p><strong>Course:</strong> <?= $course; ?></p>
    <p><strong>Year:</strong> <?= $year; ?></p>
    <p><strong>Section:</strong> <?= $section; ?></p>
    <p><strong>Email:</strong> <?= $email; ?></p>
    <p><strong>Address:</strong> <?= $address; ?></p>
    <p><strong>Contact:</strong> <?= $contact; ?></p>
    <p><strong>Hobbies:</strong> <?= $hobbies; ?></p>

</div>
</body>
</html>