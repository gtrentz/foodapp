//creating liked and disliked lists
let likedRestaurants = [];
let dislikedRestaurants = [];



//function to update the liked list on the webpage
function updateLikedRestaurants() {
  const likedRestaurantsList = document.getElementById('likedRestaurants');
  likedRestaurantsList.innerHTML = '';

  for (const restaurant of likedRestaurants) {
    const li = document.createElement('li');
    li.textContent = restaurant;
    likedRestaurantsList.appendChild(li);
  }
}

//function to update the disliked list on the webpage
function updateDislikedRestaurants() {
  const dislikedRestaurantsList = document.getElementById('dislikedRestaurants');
  dislikedRestaurantsList.innerHTML = '';

  for (const restaurant of dislikedRestaurants) {
    const li = document.createElement('li');
    li.textContent = restaurant;
    dislikedRestaurantsList.appendChild(li);
  }
}

//
const likeButtons = document.querySelectorAll('.likeButton');
const dislikeButtons = document.querySelectorAll('.dislikeButton');

likeButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    const restaurantName = document.querySelectorAll('.restaurantName')
    [index].textContent;
      likedRestaurants.push(restaurantName);
      updateLikedRestaurants();
  });
});

dislikeButtons.forEach((button, index) => {
  button.addEventListener('click', () => {
    const restaurantName = document.querySelectorAll('.restaurantName')
    [index].textContent;
  dislikedRestaurants.push(restaurantName);
  updateDislikedRestaurants();
  });
});