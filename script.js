function toggleSidebar() {
  const sidebar = document.getElementById("sidebar");
  const openBtn = document.querySelector(".openbtn");
  const content = document.getElementById("content");

  sidebar.classList.toggle("open");
  openBtn.classList.toggle("closebtn");
  content.classList.toggle("shift");

  if (sidebar.classList.contains("open")) {
    openBtn.style.left = "210px"; // Adjust the left value to match the expanded sidebar width
  } else {
    openBtn.style.left = "10px"; // Reset the left value when the sidebar is closed
  }
}
