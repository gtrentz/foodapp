//creating liked and disliked lists
let likedList = [];
let dislikedList = [];

//function to update the liked list on the webpage
function updateLikedList() {
  const likedListElement = document.getElementById('likedList');
  likedListElement.innerHTML = '';

  for (const item of likedList) {
    const li = document.createElement('li');
    li.textContent = item;
    likedListElement.appendChild(li);
  }
}

//function to update the disliked list on the webpage
function updateDislikedList() {
  const dislikedListElement = document.getElementById('dislikedList');
  dislikedListElement.innerHTML = '';

  for (const item of dislikedList) {
    const li = document.createElement('li');
    li.textContent = item;
    dislikedListElement.appendChild(li);
  }
}

//
const likeButton = document.getElementById('likeButton');
const dislikeButton = document.getElementById('dislikeButton');

likeButton.addEventListener('click', () => {
  likedList.push(restaurant);
  updateLikedList();
});

dislikeButton.addEventListener('click', () => {
  dislikedList.push(restaurant);
  updateDislikedList();
});