<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST" action="/products/update/<?= $product['id'] ?>">
        <label>Name:</label>
        <input type="text" name="product_name" value="<?= $product['product_name'] ?>" required>
        <br><br>
        <label>Description:</label>
        <textarea name="description"><?= $product['description'] ?></textarea>
        <br><br>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
        <br><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
        <br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
