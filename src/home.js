var likeBtn = document.getElementById('green');
var dislikeBtn = document.getElementById('red');

likeBtn.addEventListener('click', function() {
  
    if (dislikeBtn.classList.contains('red')) {
      dislikeBtn.classList.remove('red');
    } 
  this.classList.toggle('green');
  
});

dislikeBtn.addEventListener('click', function() {
  
    if (likeBtn.classList.contains('green')) {
      likeBtn.classList.remove('green');
    } 
  this.classList.toggle('red');
  
});

