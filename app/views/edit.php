<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .product-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555;
            font-weight: bold;
        }

        input,
        textarea {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        input:focus,
        textarea:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <main class="product-container">
        <h1>Edit Product</h1>
        <form method="POST" action="/products/update/<?= $product['id'] ?>">
            <label for="product_name">Name:</label>
            <input id="product_name" type="text" name="product_name" value="<?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8') ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8') ?></textarea>

            <label for="price">Price:</label>
            <input id="price" type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>

            <label for="quantity">Quantity:</label>
            <input id="quantity" type="number" name="quantity" value="<?= $product['quantity'] ?>" required>

            <button type="submit">Update</button>
        </form>
    </main>
</body>
</html>
