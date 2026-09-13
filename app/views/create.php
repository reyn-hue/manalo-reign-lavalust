<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST" action="/products/store">
        <label>Name:</label>
        <input type="text" name="product_name" required>
        <br><br>
        <label>Description:</label>
        <textarea name="description"></textarea>
        <br><br>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" required>
        <br><br>
        <label>Quantity:</label>
        <input type="number" name="quantity" required>
        <br><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
