async function postForm(url, data){
  const body = new URLSearchParams(data);
  const res = await fetch(url, {
    method: "POST",
    headers: {"Content-Type":"application/x-www-form-urlencoded"},
    body
  });
  return res.json();
}

function escapeHtml(s){
  return String(s).replaceAll("&","&amp;").replaceAll("<","&lt;").replaceAll(">","&gt;")
    .replaceAll('"',"&quot;").replaceAll("'","&#039;");
}

async function loadBookings(){
  const res = await fetch("../Controller/BookingController.php?action=list");
  const json = await res.json();

  const tbody = document.querySelector("#bookingTable tbody");
  tbody.innerHTML = "";

  if(!json.ok) return;

  json.data.forEach(b => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
      <td>${escapeHtml(b.customer_name)}</td>
      <td>${escapeHtml(b.event_name)}</td>
      <td>${escapeHtml(b.event_date)}</td>
      <td>
        <button class="btn small danger" data-id="${b.id}">Delete</button>
      </td>
    `;
    tbody.appendChild(tr);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  loadBookings();

  const form = document.getElementById("bookingForm");
  const msg = document.getElementById("msg");

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    msg.textContent = "";

    const customer = document.getElementById("customer_name").value.trim();
    const event = document.getElementById("event_name").value.trim();
    const date = document.getElementById("event_date").value;

    // JS validation
    if(customer.length < 2) { msg.textContent = "Customer name too short"; return; }
    if(event.length < 2)    { msg.textContent = "Event name too short"; return; }
    if(!/^\d{4}-\d{2}-\d{2}$/.test(date)) { msg.textContent = "Select a valid date"; return; }

    const json = await postForm("../Controller/BookingController.php?action=add", {
      customer_name: customer,
      event_name: event,
      event_date: date
    });

    if(!json.ok){ msg.textContent = json.error || "Failed"; return; }

    form.reset();
    msg.textContent = "Saved!";
    loadBookings();
  });

  document.querySelector("#bookingTable").addEventListener("click", async (e) => {
    if(e.target.matches("button[data-id]")){
      const id = e.target.getAttribute("data-id");
      const json = await postForm("../Controller/BookingController.php?action=delete", { id });
      if(json.ok) loadBookings();
    }
  });
});
