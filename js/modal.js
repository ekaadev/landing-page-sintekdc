window.onload = function() {
    openModalIfMessages();
}
 
 function openModalIfMessages() {
    var messagesElement = document.getElementById('messages');
    if (messagesElement.innerHTML.trim() !== '') {
       openModal();
    }
 }
 
 function openModal() { document.getElementById('myModal').style.display = 'flex';}
 
 function closeModal() { document.getElementById('myModal').style.display = 'none';}
 