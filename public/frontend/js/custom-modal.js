function openCustomModal() {
  document.getElementById("customModal").style.display = "block";
}

function closeCustomModal() {
  document.getElementById("customModal").style.display = "none";
}

function confirmCustomAction() {
  // Add your confirm action logic here
  alert("Confirmed!");
  closeCustomModal();
}

