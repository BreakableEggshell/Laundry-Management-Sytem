<?php
    session_start();
    if(isset($_SESSION["user_Username"])){
        header("Location: dashboard.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laundry System Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f5f5f5; margin: 0; padding: 0; }
    header { background-color: #2c3e50; color: white; padding: 20px; text-align: center; }
    nav { background-color: #34495e; padding: 10px; display: flex; justify-content: center; gap: 15px; }
    nav a { color: white; text-decoration: none; font-weight: bold; }
    section { padding: 20px; }
    .card { background: white; padding: 20px; margin: 10px 0; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    button { background-color: #2ecc71; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px; }
    .modal { display: none; position: fixed; z-index: 999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center; }
    .modal-content { background: white; padding: 20px; border-radius: 8px; width: 90%; max-width: 400px; }
    .close { float: right; font-size: 20px; cursor: pointer; }
    form input, form textarea, form select { width: 100%; margin: 10px 0; padding: 8px; box-sizing: border-box; }
  </style>
</head>
<body>
  <header>
    <h1>Inventory & Feedback Management System</h1>
  </header>
  <nav>
    <a href="#inventory">Inventory</a>
    <a href="#suppliers">Suppliers</a>
    <a href="#feedback">Feedback</a>
    <a href="#complaints">Complaints</a>
    <a href="#responses">Responses</a>
  </nav>
  <section id="inventory">
    <div class="card">
      <h2>Inventory Overview</h2>
      <button onclick="openModal('inventoryModal')">Add Product</button>
      <button onclick="generateReport()">Generate Daily Report</button>
    </div>
  </section>
  <section id="suppliers">
    <div class="card">
      <h2>Supplier Management</h2>
      <button onclick="openModal('supplierModal')">Add Supplier</button>
    </div>
  </section>
  <section id="feedback">
    <div class="card">
      <h2>Customer Feedback</h2>
      <button onclick="openModal('feedbackModal')">Submit Feedback</button>
    </div>
  </section>
  <section id="complaints">
    <div class="card">
      <h2>Complaints</h2>
      <button onclick="openModal('complaintModal')">File Complaint</button>
    </div>
  </section>
  <section id="responses">
    <div class="card">
      <h2>Admin Responses</h2>
      <button onclick="openModal('responseModal')">Add Response</button>
    </div>
  </section>

  <!-- MODALS -->
  <div id="inventoryModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('inventoryModal')">&times;</span>
      <h3>Add Product</h3>
      <form action="add_product.php" method="post">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="text" name="category" placeholder="Category">
        <input type="text" name="unit" placeholder="Unit">
        <input type="number" name="current_stock" placeholder="Current Stock" required>
        <input type="number" name="reorder_level" placeholder="Reorder Level">
        <select name="status">
          <option value="Available">Available</option>
          <option value="Low Stock">Low Stock</option>
          <option value="Out of Stock">Out of Stock</option>
        </select>
        <button type="submit">Save</button>
      </form>
    </div>
  </div>

  <div id="supplierModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('supplierModal')">&times;</span>
      <h3>Add Supplier</h3>
      <form action="add_supplier.php" method="post">
        <input type="text" name="supplier_name" placeholder="Supplier Name" required>
        <input type="text" name="contact_person" placeholder="Contact Person">
        <input type="text" name="phone" placeholder="Phone">
        <input type="email" name="email" placeholder="Email">
        <textarea name="address" placeholder="Address"></textarea>
        <button type="submit">Save</button>
      </form>
    </div>
  </div>

  <div id="feedbackModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('feedbackModal')">&times;</span>
      <h3>Submit Feedback</h3>
      <form action="submit_feedback.php" method="post">
        <select name="rating" required>
          <option value="">Rating (1–5)</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <textarea name="comments" placeholder="Your feedback..." required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <div id="complaintModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('complaintModal')">&times;</span>
      <h3>File Complaint</h3>
      <form action="file_complaint.php" method="post">
        <textarea name="description" placeholder="Describe your complaint..." required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <div id="responseModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal('responseModal')">&times;</span>
      <h3>Add Admin Response</h3>
      <form action="add_response.php" method="post">
        <input type="number" name="complaint_id" placeholder="Complaint ID" required>
        <textarea name="message" placeholder="Response message..." required></textarea>
        <button type="submit">Submit Response</button>
      </form>
    </div>
  </div>

  <script>
    function openModal(id) {
      document.getElementById(id).style.display = 'flex';
    }
    function closeModal(id) {
      document.getElementById(id).style.display = 'none';
    }
    function generateReport() {
      alert('Generating daily inventory report... (Staff-only feature)');
    }
  </script>
</body>
</html>