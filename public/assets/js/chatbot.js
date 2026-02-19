const gymChatToggle = document.getElementById("gymChatToggle");
const gymChatbox = document.getElementById("gymChatbox");
const gymCloseChat = document.getElementById("gymCloseChat");

gymChatToggle.addEventListener("click", () => {
    gymChatbox.classList.add("active");
});

gymCloseChat.addEventListener("click", () => {
    gymChatbox.classList.remove("active");
});