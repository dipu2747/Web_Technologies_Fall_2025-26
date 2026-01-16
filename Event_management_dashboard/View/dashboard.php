<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../assets/style.css">
  <title>Event Dashboard</title>
</head>
<body>

<header class="topbar">
  <div>
    <h1>Event Dashboard</h1>
    <p class="sub">Direct dashboard (No login)</p>
  </div>
  <a class="btn outline" href="./dashboard.php">Logout</a>
</header>

<main class="wrap">
  <section class="card">
    <h2>Add Booking</h2>

    <form id="bookingForm">
      <label>Customer Name</label>
      <input id="customer_name" type="text" placeholder="e.g. Rahim" required>

      <label>Booking Event</label>
      <input id="event_name" type="text" placeholder="e.g. Wedding" required>

      <label>Date</label>
      <input id="event_date" type="date" required>

      <button class="btn" type="submit">Save</button>
      <div id="msg" class="sub"></div>
    </form>
  </section>

  <section class="card">
    <h2>Bookings</h2>

    <div class="table-wrap">
      <table id="bookingTable">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Booking Event</th>
            <th>Date</th>
            <th style="width:140px;">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <div id="tableMsg" class="sub"></div>
  </section>
</main>

<script src="../assets/app.js"></script>
</body>
</html>
