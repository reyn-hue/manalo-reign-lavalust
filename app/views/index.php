<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .products-container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        a,
        button {
            color: #007bff;
            font: inherit;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        .delete-form {
            display: inline;
        }

        .delete-button {
            padding: 0;
            border: 0;
            background: transparent;
            cursor: pointer;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <main class="products-container">
        <h1>Products</h1>
        <nav class="actions">
            <a href="/products/create">Add Product</a>
            <a href="/logout">Logout</a>
        </nav>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>
                <a href="/products/edit/<?= $product['id'] ?>">Edit</a> |
                <form class="delete-form" method="POST" action="/products/delete/<?= $product['id'] ?>" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    <button class="delete-button" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </main>
</body>
</html>
