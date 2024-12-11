var menu = document.getElementById("bar");
var item = document.getElementById("item")

item.style.right = '-300px';
menu.onclick = function(){
    // body

    if(item.style.right =='-300px'){
        item.style.right = '0';
    }
    else{
        item.style.right ='-300px';
    }
}
const btnLogin = document.querySelector('.btnLogin-popup');
const popup = document.querySelector('.popup');
const closeButton = document.querySelector('.close-button');

// Show the popup when the login button is clicked
btnLogin.addEventListener('click', () => {
  popup.style.display = 'block';
});

// Close the popup when the close button is clicked
closeButton.addEventListener('click', () => {
  popup.style.display = 'none';
});

// Close the popup when the background is clicked
popup.addEventListener('click', (event) => {
  if (event.target === popup) {
    popup.style.display = 'none';
  }
});

